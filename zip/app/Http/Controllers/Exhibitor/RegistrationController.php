<?php

namespace App\Http\Controllers\Exhibitor;

use App\Http\Controllers\GlobalController;
use App\Jobs\RequirementForm;
use App\Models\BaseLogic;
use App\Models\Head;
use App\Models\Inquiry;
use App\Models\InquiryCategory;
use App\Models\InquiryCompany;
use App\Models\InquiryDetail;
use App\Models\StallInquiry;
use Auth;
use Illuminate\Http\Request;

class RegistrationController extends GlobalController
{
    public function __construct()
    {
        $this->middleware('exhibitor');
    }

    public function details()
    {
        return view('exhibitor.registration.index');
    }

    public function payment(Request $request)
    {
        $heads = Head::all();

        $paymentDetail = [];
        $total = 0;
        $cash = 0;

        if (! is_null($heads)) {
            foreach ($heads as $hk => $hv) {
                $d = [];

                //REGISTRATION
                if ($hv->name === 'REGISTRATION') {
                    $d['head_id'] = $hv->id;
                    $d['head'] = $hv->description;
                    $d['detail'] = '--';
                    $detail = BaseLogic::where('stall_type', $request->stall_type)->where('head', $hv->name)->first();
                    $d['rate'] = $detail->rate;
                    $d['price'] = ! is_null($detail) ? '+₹ '.indian_number_format($detail->rate) : 0;
                    $d['total'] = $detail->rate;
                    $d['type'] = 'ADD';
                    $total += ! is_null($detail) ? $detail->rate : 0;
                }

                //RATE
                if ($hv->name === 'RATE') {
                    $d['head_id'] = $hv->id;
                    $d['head'] = $hv->description;
                    $detail = BaseLogic::where('stall_type', $request->stall_type)->where('head', $hv->name)->first();
                    $rate = ! is_null($detail) ? $detail->rate : 0;
                    $d['rate'] = $detail->rate;
                    $value = $request->stall_size * $rate;
                    $d['detail'] = $request->stall_size.' x ₹ '.indian_number_format($rate);
                    $d['price'] = '+₹ '.indian_number_format($value);
                    $d['total'] = $value;
                    $d['type'] = 'ADD';
                    $total += $value;
                }

                //CORNER BOOTH
                if ($request->corner_booth !== 'ONESIDE' && $hv->name === 'CORNERBOOTH') {
                    $d['head_id'] = $hv->id;
                    $d['head'] = $hv->description;
                    $detail = BaseLogic::where('stall_type', $request->stall_type)->where('head', $request->corner_booth)->first();
                    $rate = ! is_null($detail) ? $detail->rate : 0;
                    $d['rate'] = $detail->rate;
                    $value = $request->stall_size * $rate;
                    $d['detail'] = $request->stall_size.' x ₹ '.indian_number_format($rate);
                    $d['price'] = '+₹ '.indian_number_format($value);
                    $d['total'] = $value;
                    $d['type'] = 'ADD';
                    $total += $value;
                }

                //GSPMADISCOUNT
                if ($request->gspma !== '' && $hv->name === 'GSPMADISCOUNT') {
                    $d['head_id'] = $hv->id;
                    $d['head'] = $hv->description;
                    $detail = BaseLogic::where('stall_type', $request->stall_type)->where('head', $hv->name)->first();
                    $rate = ! is_null($detail) ? $detail->rate : 0;
                    $d['rate'] = $detail->rate;
                    $value = $request->stall_size * $rate;
                    $d['detail'] = $request->stall_size.' x ₹ '.indian_number_format($rate);
                    $d['price'] = '-₹ '.indian_number_format($value);
                    $d['total'] = $value;
                    $d['type'] = 'MINUS';
                    $total -= $value;
                }

                //LOYALTY
                if ($request->participated === 'YES' && $hv->name === 'LOYALTY') {
                    $d['head_id'] = $hv->id;
                    $d['head'] = $hv->description;
                    $detail = BaseLogic::where('stall_type', $request->stall_type)->where('head', $hv->name)->first();
                    $rate = ! is_null($detail) ? $detail->rate : 0;
                    $d['rate'] = $detail->rate;
                    $value = $request->stall_size * $rate;
                    $d['detail'] = $request->stall_size.' x ₹ '.indian_number_format($rate);
                    $d['price'] = '-₹ '.indian_number_format($value);
                    $d['total'] = $value;
                    $d['type'] = 'MINUS';
                    $total -= $value;
                }

                //MSME
                if ($request->msmeCertificate === 'YES' && $hv->name === 'MSME' && $request->stall_size === 9) {
                    $d['head_id'] = $hv->id;
                    $d['head'] = $hv->description;
                    $d['detail'] = '';
                    $detail = BaseLogic::where('stall_type', $request->stall_type)->where('head', $hv->name)->first();
                    $rate = ! is_null($detail) ? $detail->rate : 0;
                    $d['rate'] = $detail->rate;
                    $value = $request->stall_size * $rate;
                    $d['detail'] = $request->stall_size.' x ₹ '.indian_number_format($rate);
                    $d['price'] = '-₹ '.indian_number_format($value);
                    $d['total'] = $value;
                    $d['type'] = 'MINUS';
                    $total -= $value;
                }

                //EARLYBIRD
                if ($hv->name === 'EARLYBIRD') {
                    $detail = BaseLogic::where('stall_type', $request->stall_type)->where('head', $hv->name)->first();
                    if (! is_null($detail) && $detail->expire_date >= date('Y-m-d')) {
                        $rate = ! is_null($detail) ? $detail->rate : 0;
                        $value = $request->stall_size * $rate;
                        $d['head_id'] = $hv->id;
                        $d['head'] = $hv->description;
                        $d['rate'] = $detail->rate;
                        $d['detail'] = $request->stall_size.' x ₹ '.indian_number_format($rate);
                        $d['price'] = '-₹ '.indian_number_format($value);
                        $d['total'] = $value;
                        $d['type'] = 'MINUS';
                        $total -= $value;
                    }
                }

                //SPECIAL
                if ($hv->name === 'SPECIAL') {
                    $detail = BaseLogic::where('stall_type', $request->stall_type)->where('minimum', '<=', $request->stall_size)->where('maximum', '>=', $request->stall_size)->where('head', $hv->name)->first();
                    if (! is_null($detail)) {
                        $rate = ! is_null($detail) ? $detail->rate : 0;
                        $value = $request->stall_size * $rate;
                        $d['head_id'] = $hv->id;
                        $d['head'] = $hv->description;
                        $d['rate'] = $detail->rate;
                        $d['detail'] = $request->stall_size.' x ₹ '.indian_number_format($rate);
                        $d['price'] = '-₹ '.indian_number_format($value);
                        $d['total'] = $value;
                        $d['type'] = 'MINUS';
                        $total -= $value;
                    }
                }

                //CASH
                if ($hv->name === 'CASH') {
                    $detail = BaseLogic::where('stall_type', $request->stall_type)->where('head', $hv->name)->first();
                    if (! is_null($detail)) {
                        $rate = ! is_null($detail) ? $detail->rate : 0;
                        $value = $request->stall_size * $rate;
                        $d['head_id'] = $hv->id;
                        $d['head'] = $hv->description;
                        $d['rate'] = $detail->rate;
                        $d['detail'] = $request->stall_size.' x ₹ '.indian_number_format($rate);
                        $d['price'] = '-₹ '.indian_number_format($value);
                        $d['total'] = $value;
                        $d['type'] = 'MINUS';
                        $cash = $value;
                        $total -= $value;
                    }
                }

                if (count($d) > 0) {
                    $paymentDetail['detail'][] = $d;
                }
            }
        }

        $gst = $total * 18 / 100;
        $paymentDetail['subtotal'] = $total;
        $paymentDetail['gst'] = $gst;
        $paymentDetail['total'] = $total + $gst;

        $subtotal = $total + $cash;
        $gst = $subtotal * 18 / 100;
        $paymentDetail['after_subtotal'] = $subtotal;
        $paymentDetail['after_gst'] = $gst;
        $paymentDetail['after_total'] = $subtotal + $gst;

        $paymentDetail['state'] = $request->state;

        $view = view('exhibitor.registration.payment_detail', compact('paymentDetail'))->render();

        return \Response::json(['html' => $view]);
    }

    public function generateInquiry(Request $request)
    {
        $inquiry = new Inquiry();
        $inquiry->exhibitor_id = Auth::guard('exhibitor')->user()->id;
        $inquiry->company_name = $request->company_name;
        $inquiry->address = $request->address;
        $inquiry->landmark = $request->landmark;
        $inquiry->area = $request->area;
        $inquiry->city = $request->city;
        $inquiry->pincode = $request->pincode;
        $inquiry->state = $request->state;
        $inquiry->pan = $request->pan;
        $inquiry->tan = $request->tan;
        $inquiry->gstn = $request->gstn;
        $inquiry->advertising = $request->is_advertise;
        $inquiry->subtotal = $request->subtotal;
        $inquiry->gst = $request->gst;
        $inquiry->total = $request->total;
        $inquiry->reference = $request->reference;
        $inquiry->remarks = $request->remarks;
        $inquiry->save();

        //company
        $company = new InquiryCompany();
        $company->inquiry_id = $inquiry->id;
        $company->chair_person = $request->company_chairperson;
        $company->chair_person_desigantion = $request->designation;
        $company->chair_person_mobile = $request->mobile_number;
        $company->chair_person_email = $request->email_id;
        $company->contact_person = $request->contact_person;
        $company->contact_person_desigantion = $request->contact_person_designation;
        $company->contact_person_email = $request->contact_person_email;
        $company->contact_person_mobile = $request->contact_person_mobile;
        $company->contact_person_whatsapp = $request->contact_person_whatsapp;
        $company->phone_no_fax = $request->contact_person_phone_f;
        $company->phone_no_office = $request->contact_person_phone_office;
        $company->website = $request->website;
        $company->save();

        //stall details
        $stall = new StallInquiry();
        $stall->inquiry_id = $inquiry->id;
        $stall->stall_size = $request->stall_size;
        $stall->space_type = $request->stall_type;
        $stall->corner_booth_type = $request->corner_booth;
        $stall->requirement = $request->specific_requirement;
        $stall->participated = $request->participated;
        $stall->participation_year = $request->participation_year;
        $stall->gspma_member = $request->is_gspms_member;
        $stall->gspma_membership_number = $request->gspma_membership_number;
        $stall->msme_certificate = $request->msmecertificate;
        $stall->msme_number = $request->msme_reg_number;
        if (isset($request->msme_certificate_file)) {
            $fileName = $this->uploadImage($request->msme_certificate_file, 'msme_certificate');
            $stall->msme_certificate_file = $fileName;
        }
        $stall->save();

        //category
        if (! is_null($request->category)) {
            foreach ($request->category as $ck => $cv) {
                $category = new InquiryCategory();
                $category->inquiry_id = $inquiry->id;
                $category->category_id = $cv;
                $category->save();
            }
        }

        //detail
        if (! is_null($request->data)) {
            foreach ($request->data as $ck => $cv) {
                $detail = new InquiryDetail();
                $detail->inquiry_id = $inquiry->id;
                $detail->head_id = $cv['head_id'];
                $detail->price = $cv['rate'];
                $detail->action = $cv['type'];
                $detail->total = $cv['total'];
                $detail->save();
            }
        }

        try {
            $data = [];

            $inq = Inquiry::where('id', $inquiry->id)->with(['statedetail', 'exhibitor' => function ($q) {
                $q->with(['country']);
            }, 'category' => function ($q) {
                $q->with(['detail']);
            }, 'company', 'stall', 'detail' => function ($q) {
                $q->with(['head']);
            },
            ])->first();

            if (! is_null($inq)) {
                $cash = 0;

                //company details
                $data['company_name'] = $inq->company_name;
                $cat = [];
                if (! is_null($inq->category)) {
                    foreach ($inq->category as $ck => $cv) {
                        if (! is_null($cv->detail)) {
                            $cat[] = $cv->detail->name;
                        }
                    }
                }
                $data['category'] = implode(',', $cat);
                $data['reference'] = $inq->reference;
                $data['conname'] = ! is_null($inq->company) ? $inq->company->contact_person : '--';
                $data['conemail'] = ! is_null($inq->company) ? $inq->company->contact_person_email : '--';
                $data['conmobile'] = ! is_null($inq->company) ? $inq->company->contact_person_mobile : '--';

                //space details
                $data['space_size'] = ! is_null($inq->stall) ? $inq->stall->stall_size : '--';
                $data['space_type'] = ! is_null($inq->stall) ? $inq->stall->space_type : '--';
                $data['premium'] = ! is_null($inq->stall) ? $inq->stall->corner_booth_type : '--';
                $data['specific'] = ! is_null($inq->stall) ? $inq->stall->requirement : '--';
                $data['participated_in_plexpo'] = ! is_null($inq->stall) && $inq->stall->participated === 'NO' ? 'No' : $inq->stall->participation_year;
                $data['gspma_membership_no'] = ! is_null($inq->stall) && $inq->stall->gspma_member === 'NO' ? 'No' : $inq->stall->gspma_membership_number;
                $data['msme_certificate'] = ! is_null($inq->stall) && $inq->stall->msme_certificate === 'NO' ? 'No' : $inq->stall->msme_number;

                //pricing
                $pricing = [];
                if (! is_null($inq->detail)) {
                    foreach ($inq->detail as $ik => $iv) {
                        if ($iv->head_id === 1) {
                            $data['registration_fees'] = indian_number_format($iv->total);
                        }
                        if ($iv->head_id === 2) {
                            $data['stall_rate'] = indian_number_format($iv->total);
                        }
                        if ($iv->head_id === 6) {
                            $data['premium_for_corner_booth'] = indian_number_format($iv->total);
                        }
                        if ($iv->head_id === 3) {
                            $data['gspma_discount'] = indian_number_format($iv->total);
                        }
                        if ($iv->head_id === 5) {
                            $data['loyalty_discount'] = indian_number_format($iv->total);
                        }
                        if ($iv->head_id === 8) {
                            $cash = $iv->total;
                            $data['cash_discount'] = indian_number_format($iv->total);
                        }
                        if ($iv->head_id === 9) {
                            $data['msme_discount'] = indian_number_format($iv->total);
                        }
                        if ($iv->head_id === 4) {
                            $data['early_bird_discount'] = indian_number_format($iv->total);
                        }
                        if ($iv->head_id === 7) {
                            $data['special_discount'] = indian_number_format($iv->total);
                        }
                    }
                }

                $data['subtotal'] = indian_number_format($inq->subtotal);
                $data['grand_amount_before_date'] = indian_number_format($inq->total);
                $subtotal = $inq->subtotal + $cash;
                $gst = $subtotal * 18 / 100;
                $data['grand_total'] = indian_number_format($subtotal + $gst);
                $data['grand_amount_after_date'] = indian_number_format($subtotal + $gst);
            }

            RequirementForm::dispatch($inq->company->contact_person_email, $data)->delay(now()->addSeconds(5));
        } catch (Exception $e) {
            \Log::info($e);
        }

        return redirect(route('exhibitor.dashboard'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Exhibitor',
                'message' => 'Exhibitor inquiry successfully placed',
            ],
        ]);
    }

    public function inquiryDetail()
    {
        $inquiry = Inquiry::where('exhibitor_id', Auth::guard('exhibitor')->user()->id)->with(['category', 'company', 'stall', 'detail' => function ($q) {
            $q->with(['head']);
        },
        ])->first();

        $category = $inquiry->category()->pluck('category_id')->toArray();

        // echo "<pre>";
        // print_r($inquiry->toArray());
        // exit;

        return view('exhibitor.registration.inquiry', compact('inquiry', 'category'));
    }
}
