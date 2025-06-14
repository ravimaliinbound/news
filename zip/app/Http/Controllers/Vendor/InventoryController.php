<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Service;
use App\Models\Unit;
use App\Models\VendorServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('vendor');
    }

    public function index(Request $request)
    {
        $vendor = Auth::guard('vendor')->user();
        $vendorServices = VendorServices::where('vendor_id', $vendor->id)->get();
        $categoryIds = $vendorServices->pluck('service_id')->toArray(); // Extract category IDs

        $filter = 0;
        $query = Inventory::query();

        if ($request->filled('services')) {
            $filter = 1;
            $query->where('service_id', $request->services);
        }

        if ($request->filled('Qty_Based_Product')) {
            $filter = 1;
            if ($request->Qty_Based_Product === 'Yes') {
                $query->where('is_qty_based_product', 'on');
            } elseif ($request->Qty_Based_Product === 'No') {
                $query->where(function ($q) {
                    $q->where('is_qty_based_product', 'null')
                        ->orWhereNull('is_qty_based_product');
                });
            }
        }
        if ($request->filled('is_price_per_day')) {
            $filter = 1;
            if ($request->is_price_per_day === 'Yes') {
                $query->where('is_price_per_day', 1);
            } elseif ($request->is_price_per_day === 'No') {
                $query->where(function ($q) {
                    $q->where('is_price_per_day', 0)
                        ->orWhereNull('is_price_per_day');
                });
            }
        }

        // if ($request->filled('Status')) {
        //     $filter = 1;
        //     $query->where('status', $request->Status == 'Active' ? 1 : 0);
        // }
        $filter = $request->filled('services') || $request->filled('Qty_Based_Product') ||
            $request->filled('is_price_per_day') || $request->filled('Status');

        $Inventory = $query->where('vendor_id', $vendor->id)->get();
        $services = Service::whereIn('id', $categoryIds)->get();

        return view('vendor.inventory.list', compact('Inventory', 'services', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendor = Auth::guard('vendor')->user();
        // Fetch vendor categories
        $vendorServices = VendorServices::where('vendor_id', $vendor->id)->get();

        $categoryIds = $vendorServices->pluck('service_id')->toArray(); // Extract category IDs

        $services = Service::whereIn('id', $categoryIds)->get(); // Fetch categories associated with the vendor

        // dd($categories);
        return view('vendor.inventory.add', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($_REQUEST);
        $validatedData = $request->validate([
            'services' => 'required',
            'name' => 'required|string|max:255',
            'unit_id' => 'required',
            'price_per_unit' => 'required|numeric|min:0',
        ]);

        // dd($request);
        // Create new Inventory instance
        $inventory = new Inventory();
        $inventory->vendor_id = Auth::guard('vendor')->id(); // Assuming vendor_id is stored in the Inventory model
        $inventory->service_id = $validatedData['services'];
        $inventory->name = $validatedData['name'];
        $inventory->unit_id = $validatedData['unit_id'];
        $inventory->is_qty_based_product = $request->input('is_qty_based_product') ?? null;
        $inventory->price_per_unit = $validatedData['price_per_unit'];
        $inventory->available_qty = $request->input('available_qty') ?? null; // Use null if not provided
        $inventory->is_price_per_day = $request->input('is_price_per_day') ?? null;
        // Save the inventory
        $inventory->save();

        if ($request->input('action') === 'save') {
            return redirect()->route('vendor.inventory')->with('messages', [
                [
                    'type' => 'success',
                    'title' => 'Inventory',
                    'message' => 'Inventory item Added successfully.',
                ],
            ]);
        }
        if ($request->input('action') === 'save_and_new') {
            return redirect()->route('vendor.inventory.create')->with('messages', [
                [
                    'type' => 'success',
                    'title' => 'Inventory',
                    'message' => 'Inventory item Added successfully. You can add a new item now.',
                ],
            ]);
        }
    }

    public function getVendorUnits(Request $request)
    {
        // dd($request);
        $serviceId = $request->get('service_id');

        // Ensure $serviceId is an array for flexibility
        $serviceIds = is_array($serviceId) ? $serviceId : [$serviceId];

        // Fetch units based on service ids through the pivot table
        $units = Unit::whereIn('id', function ($query) use ($serviceIds) {
            $query->select('unit_id')
                ->from('service_unit')
                ->whereIn('service_id', $serviceIds);
        })->get();

        // dd($units);
        return response()->json([
            'units' => $units,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Inventory = inventory::findOrFail(base64_decode($id)); // Decode the ID and fetch the specific inventory item
        $vendor = Auth::guard('vendor')->user();
        $vendorServices = VendorServices::where('vendor_id', $vendor->id)->get();
        $categoryIds = $vendorServices->pluck('service_id')->toArray();
        $services = Service::whereIn('id', $categoryIds)->get();
        $units = Unit::all(); // Fetch all units

        // dd($Inventory);
        return view('vendor.inventory.edit', compact('services', 'Inventory', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($_REQUEST);
        $validatedData = $request->validate([
            'services' => 'required',
            'name' => 'required|string|max:255',
            'unit_id' => 'required',
            'price_per_unit' => 'required|numeric|min:0',
        ]);
        $inventory = inventory::findOrFail($request->id);
        // dd($inventory);

        $inventory->service_id = $request->input('services');
        $inventory->name = $request->input('name');
        $inventory->unit_id = $request->input('unit_id');
        $inventory->price_per_unit = $request->input('price_per_unit');
        $inventory->is_qty_based_product = $request->input('is_qty_based_product') ?? null;
        $inventory->price_per_unit = $validatedData['price_per_unit'];
        $inventory->available_qty = $request->input('available_qty') ?? null; // Use null if not provided
        $inventory->is_price_per_day = $request->input('is_price_per_day') ?? null;

        $inventory->save();

        return redirect(route('vendor.inventory'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'inventory',
                'message' => 'Inventory successfully Updated',
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail(base64_decode($id));
        $inventory->delete();

        return redirect()->route('vendor.inventory')->with('messages', [
            [
                'type' => 'success',
                'title' => 'Inventory',
                'message' => 'Inventory item deleted successfully.',
            ],
        ]);
    }
}
