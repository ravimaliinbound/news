<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendApprovalMail;
use App\Jobs\VendorRejectionMail;
use App\Models\Inventory;
use App\Models\Service;
use App\Models\Unit;
use App\Models\Vendor;
use App\Models\VendorServices;
use Illuminate\Http\Request;
use App\Jobs\SendVendorWelcomeMail;
use Illuminate\Support\Facades\Hash;


class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function createPost(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8',
            'category_id' => 'required|exists:categories,id',
            'certificates' => 'required|array|max:2', // Limit to 2 files
            'certificates.*' => 'required|file|mimes:jpg,jpeg,pdf|max:2048', // Each file max 2MB
        ]);
        $vendor = new Vendor();

        // Assigning form input values to the Vendor model
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->category_id = $request->category_id;
        $vendor->email = $request->email;

        // Hashing the password securely
        $vendor->password = Hash::make($request->password);

        // Setting the default status to "approved"
        $vendor->status = 'APPROVED';

        // Saving the vendor record in the database
        $vendor->save();


        SendVendorWelcomeMail::dispatch($request->contact_person_email, $request->company_name)->delay(now()->addSeconds(5));



        return redirect(route('admin.vendor.list'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'User',
                'message' => 'User registration successfully',
            ],
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.vendor.add');
    }

    public function list(Request $request)
    {
        $filter = 0;

        $query = Vendor::query();

        if (isset($request->category) && count($request->category) > 0) {
            $filter = 1;
            $query->whereHas('category', function ($q) use ($request) {
                $q->whereIn('category_id', $request->category);
            });
        }

        if (isset($request->status) && $request->status !== '') {
            $filter = 1;
            $query->where('status', $request->status);
        }

        $vendor = Vendor::where('is_delete', 0)
            ->with(['category' => function ($query) {
                $query->where('is_delete', 0); // Only get categories where is_delete = 0
            }])
            ->orderBy('id', 'desc')
            ->get();



        return view('admin.vendor.list', compact('vendor', 'filter'));
    }

    public function editVendor($id)
    {
        $vendor = Vendor::where('id', base64_decode($id))
            // ->with(['category'])
            ->first();

        // $category = $vendor->category()->pluck('service_id')->toArray();

        return view('admin.vendor.edit', compact('vendor'));
    }

    public function saveEditedVendor(Request $request)
    {

        // dd($request->all());
        $vendor = Vendor::findOrFail($request->id);
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->category_id = $request->category_id;
        $vendor->mobile = $request->contact_person_mobile_number;
        $vendor->email = $request->email;
        if ($request->has('password') && !empty($request->password)) {
            $vendor->password = Hash::make($request->password);
        }
        $vendor->status = 'APPROVED';

        $vendor->save();



        return redirect(route('admin.vendor.list'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'User',
                'message' => 'User details successfully updated',
            ],
        ]);
    }

    public function destroy($id, Request $request)
    {
        // Decode the ID and find the vendor
        $Vendor = Vendor::findOrFail(base64_decode($id));

        // Update the `is_delete` column to 1
        $Vendor->is_delete = 1;
        $Vendor->save();
        return redirect()->route('admin.vendor.list')
            ->with('messages', [
                [
                    'type' => 'success',
                    'title' => 'User',
                    'message' => 'User deleted successfully.',
                ],
            ]);
    }
}
