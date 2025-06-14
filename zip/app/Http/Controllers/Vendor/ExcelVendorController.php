<?php

namespace App\Http\Controllers\vendor;

use App\Exports\ExportExcelData;
use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\VendorServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExcelVendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('vendor');
    }

    /**
     * Generate vendor inventory list and export to Excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateVendorList(Request $request)
    {
        // dd($request);
        $vendor = Auth::guard('vendor')->user();
        $vendorServices = VendorServices::where('vendor_id', $vendor->id)->pluck('service_id')->toArray();

        $query = Inventory::query();
        $query->where('vendor_id', $vendor->id);

        // Apply filters if present
        if ($request->filled('services')) {
            $services = is_array($request->services) ? $request->services : [$request->services];
            $query->whereIn('service_id', $services);
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
            if ($request->is_price_per_day === 'Yes') {
                $query->whereNotNull('is_price_per_day');
            } elseif ($request->is_price_per_day === 'No') {
                $query->where(function ($q) {
                    $q->where('is_price_per_day', false)
                        ->orWhereNull('is_price_per_day');
                });
            }
        }

        // if ($request->filled('Status')) {
        //     $query->where('status', $request->Status == 'Active' ? 1 : 0);
        // }

        // Eager load relationships to avoid N+1 queries
        $query->with(['vendor', 'service', 'unit']);

        // Fetch filtered inventories
        $filteredInventories = $query->get();

        // Prepare data for export
        $filteredData = [];
        $index = 1;
        foreach ($filteredInventories as $inventory) {
            $vendorName = $inventory->vendor ? $inventory->vendor->name : 'N/A';
            $serviceName = $inventory->service ? $inventory->service->name : 'N/A';
            $unitName = $inventory->unit ? $inventory->unit->name : 'N/A';

            $filteredData[] = [
                'Sr. No.' => $index,
                'Category' => $serviceName,
                'Name' => $inventory->name,
                'Unit' => $unitName,
                'Price per Unit' => $inventory->price_per_unit,
                'Qty Based Product' => $inventory->is_qty_based_product ? 'Yes' : 'No',
                'Available Qty' => $inventory->available_qty,
                'Price per Day' => $inventory->is_price_per_day ? 'Yes' : 'No',
                'Status' => $inventory->status ? 'Active' : 'Inactive',
            ];
            $index++;
        }

        // Excel heading
        $heading = [
            'Sr. No.',
            'Category',
            'Name',
            'Unit',
            'Price per Unit',
            'Qty Based Product',
            'Available Qty',
            'Price per Day',
            'Status',
        ];

        // Determine which data to export based on request
        $data = $filteredData;
        $filename = 'vendor_inventory_'.date('YmdHis').'.xlsx';

        // Export the data to Excel
        return Excel::download(new ExportExcelData($data, $heading), $filename);
    }
}
