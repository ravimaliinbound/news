<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\GlobalController;
use App\Models\ColorAssorting;
use App\Models\Assorting;
use App\Models\PackagingSlip;
use App\Models\GatePass;
use App\Models\InwardItem;
use App\Models\Defective;
use App\Models\Sample;
use App\Models\Item;
use App\Models\Quality;
use App\Models\Warehouse;
// use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class PackagingSlipController extends GlobalController
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packaging = PackagingSlip::with('items', 'color', 'assorting')->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->get();
        // $packagingSlips = PackagingSlip::with('items')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.packaging.list', compact('packaging'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $packaging = PackagingSlip::where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->get();

        $qualities = Quality::get();
        // dd($Quality);

        $lastReceiptNumber = $packaging->isNotEmpty() ? preg_replace('/[^0-9]/', '', $packaging->first()->receipt_number) : 0;
        $newReceiptNumber = (int) $lastReceiptNumber + 1;
        return view('admin.packaging.add', compact('packaging', 'newReceiptNumber', 'qualities'));
    }
    public function edit(Request $request, $id)
    {

        $packaging = PackagingSlip::find($id);
        $qualities = Quality::get();
        return view('admin.packaging.edit', compact('packaging', 'qualities'));
    }
    public function editquality(Request $request, $id)
    {

        $quality = Quality::find($id);
        return view('admin.quality.edit', compact('quality'));
    }
    public function updatequality(Request $request, $id)
    {
        $data = Quality::find($id);
        $data->name = $request->name;
        $data->size = $request->size;
        $data->update();
        echo "<script>
        alert('Quality Updated Successfully !');
        window.location='/admin-panel/quality/list';
        </script>";
    }
    public function editwarehouse(Request $request, $id)
    {
        $warehouse = Warehouse::find($id);
        return view('admin.warehouse.edit', compact('warehouse'));
    }
    public function updatewarehouse(Request $request, $id)
    {
        $data = Warehouse::find($id);
        $data->name = $request->name;
        $data->update();
        echo "<script>
        alert('Warehouse Updated Successfully !');
        window.location='/admin-panel/warehouse/list';
        </script>";
    }
    public function gatepassedit(Request $request, $id)
    {
        $gatepass = GatePass::find($id);
        $packagings = PackagingSlip::with(['items', 'color', 'assorting'])
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.gatepass.edit', compact('gatepass', 'id', 'packagings'));
    }
    public function gatepassupdate(Request $request, $id)
    {
        $data = GatePass::find($id);
        $data->than = $request->than;
        $data->meter = $request->meter;
        $data->delivery_location = $request->delivery_location;
        $data->car_number = $request->car_number;
        $data->driver_name = $request->driver_name;

        $data->update();
        echo "<script>
        alert('Gatepass Updated Successfully !');
        window.location='/admin-panel/gatepass/list';
        </script>";
    }
    public function inwardedit(Request $request, $id)
    {
        // Fetch only necessary columns and paginate the results
        $packaging = PackagingSlip::with(['items', 'color', 'assorting', 'inwarded'])
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->get();

        $gatepass = GatePass::with('packagingSlip')->get();

        $warehouse = Warehouse::get();

        // dd($warehouse);
        return view('admin.inward.edit', compact('packaging', 'id', 'gatepass', 'warehouse'));
    }
    public function inwardupdate(Request $request, $id)
    {
        $data = InwardItem::find($id);
        $data->packaging_id = $request->packaging_id;
        $data->item_id = $request->item_id;
        $data->gate_pass_id = $request->gate_pass_id;
        $data->ware_house_id = $request->ware_house_id;
        $data->inward_quantity = $request->inward_quantity;

        $data->update();
        echo "<script>
        alert('Inward Updated Successfully !');
        window.location='/admin-panel/inward/list';
        </script>";
    }
    public function sampleedit(Request $request, $id)
    {
        $qualities = Quality::get();

        // // Fetch only necessary columns and paginate the results
        $Sample = Sample::find($id);

        // dd($Sample);
        return view('admin.sample.edit', compact('Sample', 'id', "qualities"));
    }
    public function sampleupdate(Request $request, $id)
    {
        $data = Sample::find($id);
        $data->quality = $request->quality;
        $data->name = $request->name;
        $data->quantity = $request->quantity;

        $data->update();
        echo "<script>
        alert('Sample Updated Successfully !');
        window.location='/admin-panel/sample/list';
        </script>";
    }
    public function defectiveedit(Request $request, $id)
    {
        $defective = Defective::find($id);

        $packaging = PackagingSlip::with(['items', 'color', 'assorting', 'inwarded'])
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->get();

        $selectedPackagingId = $defective->packaging_id ?? null;

        return view('admin.defective.edit', compact('packaging', 'id', 'defective', 'selectedPackagingId'));
    }
    public function defectiveupdate(Request $request, $id)
    {
        $data = Defective::find($id);
        $data->packaging_id = $request->packaging_id;
        $data->item_id = $request->item_id;
        $data->quantity = $request->quantity;

        $data->update();
        echo "<script>
        alert('Defective Updated Successfully !');
        window.location='/admin-panel/defective/list';
        </script>";
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate incoming request
        $request->validate([
            'receipt_number' => 'required|string',
            'jober_name' => 'required|string',
            'quality' => 'required|string',
            'waist' => 'nullable|integer',
            'length' => 'nullable|integer',
            'girth' => 'nullable|integer',
            'petticoat' => 'nullable|string',
            'interlock' => 'nullable|string',
            'description' => 'required|array',
            'than' => 'required|array',
            'cut' => 'required|array',
            'meter' => 'required|array',
            'description.*' => 'required|string',
            'than.*' => 'required|numeric',
            'cut.*' => 'required|numeric',
            'meter.*' => 'required|numeric',
        ]);

        $totalmeter = array_sum($request->meter);
        // dd($totalmeter);
        $total_quantity = floor($totalmeter / $request->size);

        // dd($total_quantity);
        // Create Packaging Slip
        $packagingSlip = PackagingSlip::create([
            'receipt_number' => $request->receipt_number,
            'jober_name' => $request->jober_name,
            'quality' => $request->quality,
            'size' => $request->size,
            'waist' => $request->waist,
            'length' => $request->length,
            'girth' => $request->girth,
            'total_quantity' => $total_quantity,
            'petticoat' => $request->petticoat,
            'interlock' => $request->interlock,
            'is_delete' => 0, // Default to active
        ]);

        // Store Items (if description array exists)
        if (!empty($request->description)) {
            foreach ($request->description as $index => $desc) {
                Item::create([
                    'packaging_slip_id' => $request->receipt_number,
                    'description' => $desc,
                    'than' => $request->than[$index] ?? 0,
                    'cut' => $request->cut[$index] ?? 0,
                    'meter' => $request->meter[$index] ?? 0,
                ]);
            }
        }
        if ($request->assort == 'yes') {
            // Loop through the color fields dynamically
            foreach ($request->all() as $key => $value) {
                // Check if the key matches the color field pattern (e.g., color_1, color_2, etc.)
                if (preg_match('/^color_\d+$/', $key)) {

                    // Only proceed if the color value is not empty or null
                    if (!empty($value)) {

                        // Get the corresponding quantity from the request, default to 0 if not provided
                        $quantity = $request->input('quantity')[$value] ?? 0;

                        // Save the entry only if color is not null
                        ColorAssorting::create([
                            'packaging_slip_id' => $request->receipt_number,
                            'color' => $key,
                            'quantity' => $value,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('admin.packaging.list')->with('success', 'Packaging slip stored successfully');
    }

    public function generatePdf($id)
    {

        $packagingSlip = PackagingSlip::with('items', 'assorting', 'color')->findOrFail(base64_decode($id));

        //company details
        $data['jober_name'] = $packagingSlip->jober_name;
        $data['quality'] = $packagingSlip->quality;
        $data['size'] = $packagingSlip->size;
        $data['waist'] = $packagingSlip->waist;
        $data['length'] = $packagingSlip->length;
        $data['girth'] = $packagingSlip->girth;
        $data['petticoat'] = $packagingSlip->petticoat;
        $data['interlock'] = $packagingSlip->interlock;
        $data['quantity'] = $packagingSlip->quantity;
        $data['receipt_number'] = $packagingSlip->receipt_number;
        $data['created_at'] = $packagingSlip->created_at;

        // Generate and save the PDF        
        $pdf = Pdf::loadView('pdf.invoice2', compact('packagingSlip', 'data'));
        // return $pdf->stream('packaging.pdf', ['Attachment' => false]);


        $pdf->setPaper('A5', 'portrait');
        // return $pdf->stream('result.pdf', ['Attachment' => false]);

        $savePath = public_path() . '/packaging-slip/' . $packagingSlip->receipt_number . '.pdf';

        $pdf->save($savePath);

        // Return the PDF for download
        return $pdf->download($packagingSlip->receipt_number . '_packaging.pdf');
    }

    public function assorting($id)
    {
        // Find the packaging slip and load the related data
        $packagingSlip = PackagingSlip::with('items', 'assorting', 'color')->findOrFail(base64_decode($id));

        // Prepare data for the PDF view
        $data['Name'] = $packagingSlip->assorting->first()->name ?? "";
        $data['quality'] = $packagingSlip->quality ?? "";
        $data['transport'] = $packagingSlip->assorting->first()->transport ?? "";
        $data['post'] = $packagingSlip->assorting->first()->post ?? "";
        $data['screen'] = $packagingSlip->assorting->first()->screen ?? "";
        $data['than'] = $packagingSlip->items->first()->than ?? "";
        $data['bales'] = $packagingSlip->assorting->first()->bales ?? "";
        $data['rate'] = $packagingSlip->assorting->first()->rate ?? "";
        $data['quantity'] = $packagingSlip->quantity ?? "";
        $data['receipt_number'] = $packagingSlip->receipt_number ?? "";
        $data['created_at'] = $packagingSlip->created_at ?? "";

        // Generate the PDF using the 'assorting' view and pass the data
        $pdf = Pdf::loadView('pdf.assorting', compact('packagingSlip', 'data'));


        // Set the paper size and orientation for the PDF
        $pdf->setPaper('A4', 'portrait');

        // Define the path where the PDF will be saved
        $savePath = public_path() . '/assorting/' . $packagingSlip->receipt_number . '.pdf';

        // Save the PDF to the specified path
        $pdf->save($savePath);

        // Return the PDF for download
        return $pdf->download($packagingSlip->receipt_number . '_assorting.pdf');
    }

    public function gatepasslist()
    {
        $packaging = GatePass::with('packagingSlip')->get();

        return view('admin.gatepass.list', compact('packaging'));
    }

    public function gatepasscreate(Request $request)
    {

        $nextId = GatePass::max('id') + 1;

        // Fetch only necessary columns and paginate the results
        $packaging = PackagingSlip::with(['items', 'color', 'assorting'])
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->get();
        // ->select('id', 'jober_name'); // Select only the required fields
        // ->paginate(10); // Paginate results to avoid loading too many records at once

        // dd($packaging);
        return view('admin.gatepass.create', compact('packaging', 'nextId'));
    }

    public function gatepassstore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'packaging_id' => 'required|string',
            'than' => 'required',
            'meter' => 'required',
            'delivery_location' => 'required|string',
            'car_number' => 'required|string',
            'driver_name' => 'required|string',
        ]);

        // Create Gate Pass
        GatePass::create([
            'packaging_id' => $request->packaging_id,
            'than' => $request->than,
            'meter' => $request->meter,
            'delivery_location' => $request->delivery_location,
            'car_number' => $request->car_number,
            'driver_name' => $request->driver_name,
        ]);

        // return redirect()->route('admin.gatepass.list')->with('success', 'Gate pass stored successfully');

        return redirect()->route('admin.gatepass.list')->with('messages', [
            ['type' => 'success', 'message' => 'Gate pass stored successfully', 'title' => 'Success!']
        ]);
    }

    public function generateGatePass($id)
    {

        // dd(base64_decode($id));
        $GatePass = GatePass::with('items', 'packagingSlip')->findOrFail(base64_decode($id));

        // dd($GatePass);

        //company details
        $data['id'] = $GatePass->id;
        $data['jober_name'] = $GatePass->packagingSlip->jober_name;
        $data['Bale_number'] = $GatePass->packaging_id;
        $data['than'] = $GatePass->than;
        $data['meter'] = $GatePass->meter;
        $data['delivery_location'] = $GatePass->delivery_location;
        $data['car_number'] = $GatePass->car_number;
        $data['driver_name'] = $GatePass->driver_name;
        $data['bundle'] = $GatePass->bundle;
        $data['created_at'] = $GatePass->created_at;

        // dd($data);


        // Generate and save the PDF        
        $pdf = Pdf::loadView('pdf.gatePass', compact('data'));
        $pdf->setPaper('A5', 'portrait');

        // return $pdf->stream('gatePass.pdf', ['Attachment' => false]);

        $savePath = public_path() . '/gate-pass/' . $GatePass->id . '.pdf';

        $pdf->save($savePath);

        // Return the PDF for download
        return $pdf->download($GatePass->id . '_gate-pass.pdf');
    }

    public function inwardlist()
    {
        $inward = InwardItem::with('packagingSlip', 'items', 'color', 'gatePass', 'warehouse')->get();

        // dd($inward);
        return view('admin.inward.list', compact('inward'));
    }

    public function inwardcreate(Request $request)
    {

        $nextId = InwardItem::max('id') + 1;

        // Fetch only necessary columns and paginate the results
        $packaging = PackagingSlip::with(['items', 'color', 'assorting', 'inwarded'])
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->get();

        $gatepass = GatePass::with('packagingSlip')->get();

        $warehouse = Warehouse::get();

        // dd($warehouse);
        return view('admin.inward.add', compact('packaging', 'nextId', 'gatepass', 'warehouse'));
    }

    public function inwardstore(Request $request)
    {
        // dd($request->all());

        // Create Gate Pass
        $inward = new InwardItem();
        $inward->packaging_id = $request->packaging_id;
        $inward->item_id = $request->item_id;
        $inward->gate_pass_id = $request->gate_pass_id;
        $inward->ware_house_id = $request->ware_house_id;
        $inward->inward_quantity = $request->inward_quantity;
        $inward->date = Carbon::createFromFormat('d/m/Y h:i A', $request->date)->format('Y-m-d H:i:s');
        $inward->save();

        return redirect()->route('admin.inward.list')->with('messages', [
            ['type' => 'success', 'message' => 'Gate pass stored successfully', 'title' => 'Success!']
        ]);
    }


    public function generateinward($id)
    {

        // dd(base64_decode($id));
        $InwardItem = InwardItem::with('items', 'packagingSlip', 'color', 'warehouse', 'gatePass')->findOrFail(base64_decode($id));

        // dd($GatePass);

        //company details
        $data['id'] = $InwardItem->id;
        $data['jober_name'] = $InwardItem->packagingSlip->jober_name;

        // Get total quantity for this packaging_id (Check if packagingSlip exists)
        // $total_quantity = optional($InwardItem->packagingSlip)->color->sum('quantity') ?? 0;
        $total_quantity = $InwardItem->packagingSlip->total_quantity ?? 0;

        $data['inwarded'] = $InwardItem->inward_quantity;
        $data['warehouse'] = $InwardItem->warehouse->name ?? "";
        $data['date'] = $InwardItem->date ?? "";



        // Get total inwarded quantity for this packaging_id
        $inwarded_quantity = InwardItem::where('packaging_id', $InwardItem->packaging_id)->sum('inward_quantity');

        // Calculate remaining quantity
        $remaining_quantity = max(0, $total_quantity - $inwarded_quantity);

        // Assign values to data array
        $data['quantity'] = $total_quantity;
        // $data['inwarded'] = $inwarded_quantity;
        $data['remaining'] = $remaining_quantity;


        $data['Bale_number'] = $InwardItem->packaging_id;
        $data['created_at'] = $InwardItem->created_at;

        // dd($data);

        // Generate and save the PDF        
        $pdf = Pdf::loadView('pdf.inward', compact('data'));
        $pdf->setPaper('A5', 'portrait');

        // return $pdf->stream('inward.pdf', ['Attachment' => false]);

        $savePath = public_path() . '/inward/' . $InwardItem->id . '.pdf';

        $pdf->save($savePath);

        // Return the PDF for download
        return $pdf->download($InwardItem->id . '_inward.pdf');
    }

    public function samplelist()
    {
        $inward = Sample::get();


        return view('admin.sample.list', compact('inward'));
    }

    public function samplecreate(Request $request)
    {

        $nextId = Sample::max('id') + 1;

        $qualities = Quality::get();


        // // Fetch only necessary columns and paginate the results
        $Sample = Sample::orderBy('id', 'desc')
            ->get();

        // dd($Sample);
        return view('admin.sample.add', compact('Sample', 'nextId', "qualities"));
    }

    public function samplestore(Request $request)
    {
        // dd($request->all());

        // Create Gate Pass
        Sample::create([
            'quality' => $request->quality,
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('admin.sample.list')->with('messages', [
            ['type' => 'success', 'message' => 'Gate pass stored successfully', 'title' => 'Success!']
        ]);
    }


    public function generatesample($id)
    {

        // dd(base64_decode($id));
        $id = base64_decode($id); // Decode the ID
        $InwardItem = Sample::find($id); // Fetch the record using Eloquent


        // dd($InwardItem);

        //company details
        $data['id'] = $InwardItem->id;
        $data['name'] = $InwardItem->name;
        $data['quality'] = $InwardItem->quality;
        $data['quantity'] = $InwardItem->quantity;
        $data['created_at'] = $InwardItem->created_at;

        // dd($data);

        // Generate and save the PDF        
        $pdf = Pdf::loadView('pdf.sample', compact('data'));
        $pdf->setPaper('A5', 'portrait');

        // return $pdf->stream('inward.pdf', ['Attachment' => false]);

        $savePath = public_path() . '/sample/' . $InwardItem->id . '.pdf';

        $pdf->save($savePath);

        // Return the PDF for download
        return $pdf->download($InwardItem->id . '_sample.pdf');
    }


    public function defectivelist()
    {
        $defective = Defective::get();
        //   dd($defective);
        return view('admin.defective.list', compact('defective'));
    }

    public function defectivecreate(Request $request)
    {

        $nextId = Defective::max('id') + 1;

        // Fetch only necessary columns and paginate the results
        $packaging = PackagingSlip::with(['items', 'color', 'assorting', 'inwarded'])
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->get();
        // ->select('id', 'jober_name'); // Select only the required fields
        // ->paginate(10); // Paginate results to avoid loading too many records at once

        // dd($packaging);
        return view('admin.defective.add', compact('packaging', 'nextId'));
    }

    public function defectivestore(Request $request)
    {
        // dd($request->all());

        // Create Gate Pass
        Defective::create([
            'packaging_id' => $request->packaging_id,
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('admin.defective.list')->with('messages', [
            ['type' => 'success', 'message' => 'Gate pass stored successfully', 'title' => 'Success!']
        ]);
    }


    public function generatedefective($id)
    {

        // dd(base64_decode($id));
        $InwardItem = Defective::with('items', 'packagingSlip', 'color')->findOrFail(base64_decode($id));

        // dd($GatePass);

        //company details
        $data['id'] = $InwardItem->id;
        $data['jober_name'] = $InwardItem->packagingSlip->jober_name;

        // Get total quantity for this packaging_id (Check if packagingSlip exists)

        $data['defective'] = $InwardItem->quantity;

        // Get total inwarded quantity for this packaging_id

        // Calculate remaining quantity

        // Assign values to data array
        // $data['inwarded'] = $inwarded_quantity;


        $data['Bale_number'] = $InwardItem->packaging_id;
        $data['created_at'] = $InwardItem->created_at;

        // dd($data);

        // Generate and save the PDF        
        $pdf = Pdf::loadView('pdf.defective', compact('data'));
        $pdf->setPaper('A5', 'portrait');

        // return $pdf->stream('defective.pdf', ['Attachment' => false]);

        $savePath = public_path() . '/defective/' . $InwardItem->id . '.pdf';

        $pdf->save($savePath);

        // Return the PDF for download
        return $pdf->download($InwardItem->id . '_defective.pdf');
    }




    public function qualitylist(request $request)
    {
        // dd($request->all());
        $Quality = Quality::get();
        //   dd($defective);
        return view('admin.quality.list', compact('Quality'));
    }

    public function qualitycreate(Request $request)
    {
        return view('admin.quality.add');
    }

    public function qualitystore(Request $request)
    {
        // dd($request->all());

        // Create Gate Pass
        Quality::create([
            'name' => $request->name,
            'size' => $request->size,
        ]);

        return redirect()->route('admin.quality.list')->with('messages', [
            ['type' => 'success', 'message' => 'Qualityu Added successfully', 'title' => 'Success!']
        ]);
    }



    public function warehouselist(request $request)
    {
        // dd($request->all());

        $warehouse = Warehouse::get();
        //   dd($defective);
        return view('admin.warehouse.list', compact('warehouse'));
    }

    public function warehousecreate(Request $request)
    {
        // dd($request->all());
        return view('admin.warehouse.add');
    }

    public function warehousestore(Request $request)
    {
        // dd($request->all());

        // Create Gate Pass
        Warehouse::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.warehouse.list')->with('messages', [
            ['type' => 'success', 'message' => 'Warehouse Added successfully', 'title' => 'Success!']
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $data = PackagingSlip::find($id);
        $data->delete();
        echo "<script>
        alert('Packaging Slip Deleted Successfully !');
        window.location='/admin-panel/packaging/list';
        </script>";
    }
    public function deletequality(Request $request, $id)
    {
        $data = Quality::find($id);
        $data->delete();
        echo "<script>
        alert('Quality Deleted Successfully !');
        window.location='/admin-panel/quality/list';
        </script>";
    }
    public function deletewarehouse(Request $request, $id)
    {
        $data = Warehouse::find($id);
        $data->delete();
        echo "<script>
        alert('Warehouse Deleted Successfully !');
        window.location='/admin-panel/warehouse/list';
        </script>";
    }
    public function deletegatepass(Request $request, $id)
    {
        $data = GatePass::find($id);
        $data->delete();
        echo "<script>
        alert('Gate Pass Slip Deleted Successfully !');
        window.location='/admin-panel/gatepass/list';
        </script>";
    }
    public function deleteinward(Request $request, $id)
    {
        $data = InwardItem::find($id);
        $data->delete();
        echo "<script>
        alert('Inward Deleted Successfully !');
        window.location='/admin-panel/inward/list';
        </script>";
    }
    public function deletesample(Request $request, $id)
    {
        $data = Sample::find($id);
        $data->delete();
        echo "<script>
        alert('Sample Deleted Successfully !');
        window.location='/admin-panel/sample/list';
        </script>";
    }
    public function deletedefective(Request $request, $id)
    {
        $data = Defective::find($id);
        $data->delete();
        echo "<script>
        alert('Defective Piece Deleted Successfully !');
        window.location='/admin-panel/defective/list';
        </script>";
    }
}
