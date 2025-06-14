<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportExcelData;
use App\Http\Controllers\GlobalController;
use App\Models\Exhibitor;
use App\Models\Inquiry;
use App\Models\Inventory;
use App\Models\Vendor;
use App\Models\VendorServices;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends GlobalController
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * [generateAdminExcel description]
     *
     * @param  Request  $request  [description]
     *
     * @return [type]           [description]
     */
    public function generateInquiryExcel(Request $request)
    {
        $type = ['EXHIBITOR' => 'Normal Exhibitor', 'ASSOCIATION' => 'Association', 'MEDIA' => 'Media', 'SPONSOR' => 'Sponsor'];

        $inquiry = Inquiry::with(['statedetail', 'exhibitor' => function ($q) {
            $q->with(['country']);
        }, 'category' => function ($q) {
            $q->with(['detail']);
        }, 'company', 'stall', 'detail' => function ($q) {
            $q->with(['head']);
        },
        ])->get();

        $data = [];

        $heading = [
            'Sr No',
            'Exhibitory Type',
            'Company Name',
            'Address',
            'State',
            'Country',
            'Reference By',
            'Mobile',
            'Email',
            'GSTN',
            'Space Size(Sq. Mt.)',
            'Status',
            'Grand Total',
            'Received Amount',
            'Outstanding Amount',
            'Remarks',
            'Inquiry At',
        ];

        $i = 0;

        if (! is_null($inquiry)) {
            foreach ($inquiry as $dk => $dv) {
                $data[$dk]['sr_no'] = $dv->id;
                $data[$dk]['exhibitor_type'] = array_key_exists($dv->exhibitor->type, $type) ? $type[$dv->exhibitor->type] : '--';
                $data[$dk]['company_name'] = $dv->company_name;
                $data[$dk]['address'] = $dv->address;
                $data[$dk]['state'] = ! is_null($dv->statedetail) ? $dv->statedetail->name : '--';
                $data[$dk]['country'] = ! is_null($dv->exhibitor) && ! is_null($dv->exhibitor->country) ? $dv->exhibitor->country->nicename : '--';
                $data[$dk]['reference'] = ! is_null($dv->exhibitor) ? $dv->exhibitor->reference : '--';
                $data[$dk]['mobile'] = ! is_null($dv->company) ? $dv->company->contact_person_mobile : '--';
                $data[$dk]['email'] = ! is_null($dv->company) ? $dv->company->contact_person_email : '--';
                $data[$dk]['gstn'] = $dv->gstn;
                $data[$dk]['space_size'] = ! is_null($dv->stall) ? $dv->stall->stall_size : '--';
                $data[$dk]['status'] = $dv->status;
                $data[$dk]['grand_total'] = $dv->total;
                $data[$dk]['received_amount'] = $dv->received_amount;
                $data[$dk]['outstanding'] = $dv->total - $dv->received_amount;
                $data[$dk]['remarks'] = $dv->remarks;
                $data[$dk]['inquiry_at'] = $dv->created_at;
            }
        }

        return Excel::download(new ExportExcelData($data, $heading), 'exhibitor_list_'.date('dmYhis').'.xlsx');
    }

    /**
     * [generateRoleExcel description]
     *
     * @param  Request  $request  [description]
     *
     * @return [type]           [description]
     */
    public function generateDashboardExcel(Request $request)
    {
        $type = ['EXHIBITOR' => 'Normal Exhibitor', 'ASSOCIATION' => 'Association', 'MEDIA' => 'Media', 'SPONSOR' => 'Sponsor'];

        $inquiry = Inquiry::with(['statedetail', 'exhibitor' => function ($q) {
            $q->with(['country']);
        }, 'category' => function ($q) {
            $q->with(['detail']);
        }, 'company', 'stall', 'detail' => function ($q) {
            $q->with(['head']);
        },
        ])->get();

        $data = [];

        $heading = [
            'Sr No',
            'Exhibitory Type',
            'Company Name',
            'Address',
            'Landmark',
            'Area',
            'City',
            'Pincode',
            'State',
            'Country',
            'Reference By',
            'PAN',
            'TAN',
            'GSTN',
            'Category',
            'Interested in advertising at the exhibition?',
            'Company Chairperson name',
            'Company Chairperson Designation',
            'Company Chairperson Mobile no',
            'Company Chairperson Email ID',
            'Contact Person - Related to Exhibition',
            'Contact Person - Designation',
            'Contact Person - Email ID',
            'Contact Person - Mobile No',
            'Contact Person Whastapp',
            'Phone No (F)',
            'Phone No (o)',
            'Website',
            'Space Size(Sq. Mt.)',
            'Space Type',
            'Premium For Corner Booth',
            'Specific Requirements',
            'Participated in plexpo before',
            'Plexpo Participation Year',
            'Are you an active GSPMA member?',
            'GSPMA Membership No',
            'Do you have MSME Certificate?',
            'MSME Reg. Number',
            'MSME Certificate',
            'status',
            'Grand Total',
            'Received Amount',
            'Outstanding Amount',
            'Remarks',
            'Inquiry At',
        ];

        $i = 0;

        if (! is_null($inquiry)) {
            foreach ($inquiry as $dk => $dv) {
                $data[$dk]['sr_no'] = $dv->id;
                $data[$dk]['exhibitor_type'] = array_key_exists($dv->exhibitor->type, $type) ? $type[$dv->exhibitor->type] : '--';
                $data[$dk]['company_name'] = $dv->company_name;
                $data[$dk]['address'] = $dv->address;
                $data[$dk]['landmark'] = $dv->landmark;
                $data[$dk]['area'] = $dv->area;
                $data[$dk]['city'] = $dv->city;
                $data[$dk]['pincode'] = $dv->pincode;
                $data[$dk]['state'] = ! is_null($dv->statedetail) ? $dv->statedetail->name : '--';
                $data[$dk]['country'] = ! is_null($dv->exhibitor) && ! is_null($dv->exhibitor->country) ? $dv->exhibitor->country->nicename : '--';
                $data[$dk]['reference'] = ! is_null($dv->exhibitor) ? $dv->exhibitor->reference : '--';
                $data[$dk]['pan'] = $dv->pan;
                $data[$dk]['tan'] = $dv->tan;
                $data[$dk]['gstn'] = $dv->gstn;
                $cat = [];
                if (! is_null($dv->category)) {
                    foreach ($dv->category as $ck => $cv) {
                        if (! is_null($cv->detail)) {
                            $cat[] = $cv->detail->name;
                        }
                    }
                }
                $data[$dk]['category'] = implode(',', $cat);
                $data[$dk]['intrested'] = $dv->advertising;
                $data[$dk]['cname'] = ! is_null($dv->company) ? $dv->company->chair_person : '--';
                $data[$dk]['cdesignation'] = ! is_null($dv->company) ? $dv->company->chair_person_desigantion : '--';
                $data[$dk]['cmobile'] = ! is_null($dv->company) ? $dv->company->chair_person_mobile : '--';
                $data[$dk]['cemail'] = ! is_null($dv->company) ? $dv->company->chair_person_email : '--';
                $data[$dk]['conname'] = ! is_null($dv->company) ? $dv->company->contact_person : '--';
                $data[$dk]['condesignation'] = ! is_null($dv->company) ? $dv->company->contact_person_desigantion : '--';
                $data[$dk]['conemail'] = ! is_null($dv->company) ? $dv->company->contact_person_email : '--';
                $data[$dk]['conmobile'] = ! is_null($dv->company) ? $dv->company->contact_person_mobile : '--';
                $data[$dk]['conwhatsapp'] = ! is_null($dv->company) ? $dv->company->contact_person_whatsapp : '--';
                $data[$dk]['phone_no_f'] = ! is_null($dv->company) ? $dv->company->phone_no_fax : '--';
                $data[$dk]['phone_no_o'] = ! is_null($dv->company) ? $dv->company->phone_no_office : '--';
                $data[$dk]['website'] = ! is_null($dv->company) ? $dv->company->website : '--';

                $data[$dk]['space_size'] = ! is_null($dv->stall) ? $dv->stall->stall_size : '--';
                $data[$dk]['space_type'] = ! is_null($dv->stall) ? $dv->stall->space_type : '--';
                $data[$dk]['premium'] = ! is_null($dv->stall) ? $dv->stall->corner_booth_type : '--';
                $data[$dk]['specific'] = ! is_null($dv->stall) ? $dv->stall->requirement : '--';
                $data[$dk]['participated_in_plexpo'] = ! is_null($dv->stall) ? $dv->stall->participated : '--';
                $data[$dk]['year'] = ! is_null($dv->stall) ? $dv->stall->participation_year : '--';
                $data[$dk]['gspma_member'] = ! is_null($dv->stall) ? $dv->stall->gspma_member : '--';
                $data[$dk]['gspma_membership_no'] = ! is_null($dv->stall) ? $dv->stall->gspma_membership_number : '--';
                $data[$dk]['msme_certificate_av'] = ! is_null($dv->stall) ? $dv->stall->msme_certificate : '--';
                $data[$dk]['msme_reg_no'] = ! is_null($dv->stall) ? $dv->stall->msme_number : '--';
                $data[$dk]['msme_certificate'] = ! is_null($dv->stall) && $dv->stall->msme_certificate_file !== '' ? \URL::to('/').'/uploads/msme_certificate/'.$dv->stall->msme_certificate_file : '--';
                $data[$dk]['status'] = $dv->status;
                $data[$dk]['grand_total'] = $dv->total;
                $data[$dk]['received_amount'] = $dv->received_amount;
                $data[$dk]['outstanding'] = $dv->total - $dv->received_amount;
                $data[$dk]['remarks'] = $dv->remarks;
                $data[$dk]['inquiry_at'] = $dv->created_at;
            }
        }

        return Excel::download(new ExportExcelData($data, $heading), 'all_inquiry_details_'.date('dmYhis').'.xlsx');
    }

    public function generateExhibitorList(Request $request)
    {
        $exhibitor = Exhibitor::with(['country'])->get();

        $data = [];

        $heading = [
            'Sr No',
            'Company Name',
            'Country',
            'Contact Person Name',
            'Contact Person Mobile Number',
            'Email',
            'Reference By',
        ];

        $i = 0;

        if (! is_null($exhibitor)) {
            foreach ($exhibitor as $dk => $dv) {
                $data[$dk]['sr_no'] = $dv->id;
                $data[$dk]['company_name'] = $dv->company_name;
                $data[$dk]['country'] = $dv->country->nicename ?? '--';
                $data[$dk]['contact_person_name'] = $dv->contact_person_name;
                $data[$dk]['mobile'] = $dv->contact_person_mobile;
                $data[$dk]['email'] = $dv->email;
                $data[$dk]['reference_by'] = $dv->reference;
            }
        }

        return Excel::download(new ExportExcelData($data, $heading), 'all_inquiry_list_'.date('dmYhis').'.xlsx');
    }

    public function generateVendorList(Request $request)
    {
        $vendorId = $request->input('vendorid');
        $vendor = Vendor::findOrFail($vendorId);
        $vendorServices = VendorServices::where('vendor_id', $vendorId)->pluck('service_id')->toArray();
        // dd($vendorId);

        $query = Inventory::query();
        $query->where('vendor_id', $vendorId);

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
                'Vendor Name' => $vendor->name,
                'Category' => $serviceName,
                'Name' => $inventory->name,
                'Unit' => $unitName,
                'Price per Unit' => $inventory->price_per_unit,
                'Qty Based Product' => $inventory->is_qty_based_product ? 'Yes' : 'No',
                'Available Qty' => $inventory->available_qty ?: 'NA',
                'Price per Day' => $inventory->is_price_per_day ? 'Yes' : 'No',
                'Status' => $inventory->status ? 'Active' : 'Inactive',
            ];
            $index++;
        }

        // Excel heading
        $heading = [
            'Sr. No.',
            'Vendor Name',
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

    public function generateAllVendorList(Request $request)
    {
        $vendorId = $request->input('vendor_id');
        // dd($vendorId);

        $query = Inventory::query();

        if ($request->filled('services')) {
            $services = is_array($request->services) ? $request->services : [$request->services];
            $query->whereIn('service_id', $services);
        }

        if ($request->filled('Qty_Based_Product')) {
            if ($request->Qty_Based_Product === 'Yes') {
                $query->where('is_qty_based_product', true);
            } elseif ($request->Qty_Based_Product === 'No') {
                $query->where(function ($q) {
                    $q->where('is_qty_based_product', false)
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

        if ($vendorId) {
            $query->where('vendor_id', $vendorId);
        }

        // Eager load relationships to avoid N+1 queries
        $query->with(['vendor', 'service', 'unit']);

        // Fetch filtered inventories
        $filteredInventories = $query->get();

        // Prepare data for export
        $filteredData = [];
        $index = 1;
        foreach ($filteredInventories as $inventory) {
            $serviceName = $inventory->service ? $inventory->service->name : 'N/A';
            $unitName = $inventory->unit ? $inventory->unit->name : 'N/A';

            $filteredData[] = [
                'Sr. No.' => $index,
                'Vendor Name' => $inventory->vendor->name,
                'Category' => $serviceName,
                'Name' => $inventory->name,
                'Unit' => $unitName,
                'Price per Unit' => $inventory->price_per_unit,
                'Qty Based Product' => $inventory->is_qty_based_product ? 'Yes' : 'No',
                'Available Qty' => $inventory->available_qty ?: 'N/A',
                'Price per Day' => $inventory->is_price_per_day ? 'Yes' : 'No',
                'Status' => $inventory->status ? 'Active' : 'Inactive',
            ];
            $index++;
        }

        // Excel heading
        $heading = [
            'Sr. No.',
            'Vendor Name',
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
