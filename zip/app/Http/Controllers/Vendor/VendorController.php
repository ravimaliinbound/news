<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Jobs\SendVendorWelcomeMail;
use App\Models\Vendor;
use App\Models\VendorServices;
use Auth;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('vendor', ['except' => ['register', 'postRegister', 'checkEmail', 'checkGstn', 'checkPan']]);
    }

    public function register()
    {
        return view('vendor.auth.register');
    }

    public function postRegister(Request $request)
    {
        // $url = 'https://www.google.com/recaptcha/api/siteverify';
        // $remoteip = $_SERVER['REMOTE_ADDR'];

        // $data = [
        //     'secret' => '6LclcsopAAAAAIeOWiM_az0YsTSM7Sj8x0EZhr73',
        //     'response' => $request->get('recaptcha'),
        //     'remoteip' => $remoteip
        // ];

        // $options = [
        //     'http' => [
        //       'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        //       'method' => 'POST',
        //       'content' => http_build_query($data)
        //     ]
        // ];

        // $context = stream_context_create($options);
        // $result = file_get_contents($url, false, $context);
        // $resultJson = json_decode($result);

        // if ($resultJson->success == true) {

        $vendor = new Vendor();
        $vendor->name = $request->company_name;
        $vendor->address = $request->address;
        $vendor->city = $request->city;
        $vendor->state = $request->state_id;
        $vendor->gstn = $request->gstn;
        $vendor->pan = $request->pan;
        $vendor->contact_person_name = $request->contact_person_name;
        $vendor->mobile = $request->contact_person_mobile_number;
        $vendor->email = $request->contact_person_email;
        $vendor->alternate_contact_person = $request->alt_contact_person;
        $vendor->alternate_mobile_number = $request->alt_contact_person_mobile_number;
        $vendor->alternate_email = $request->alt_contact_person_email;
        $vendor->password = bcrypt($request->password);
        $vendor->save();

        if (isset($request->category)) {
            foreach ($request->category as $ck => $cv) {
                $category = new VendorServices();
                $category->vendor_id = $vendor->id;
                $category->category_id = $cv;
                $category->save();
            }
        }

        $ex = Vendor::where('id', $vendor->id)->first();

        //Auth::guard('vendor')->login($ex);

        SendVendorWelcomeMail::dispatch($request->contact_person_email, $request->company_name)->delay(now()->addSeconds(5));

        return redirect(route('vendor.login'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Vendor',
                'message' => 'Vendor registration successfully',
            ],
        ]);

        // } else {
        //     return redirect()->back()->with('messages', [
        //         [
        //             'type' => 'success',
        //             'title' => 'Exhibitor',
        //             'message' => 'Captcha error',
        //         ],
        //     ]);
        // }
    }

    public function checkEmail(Request $request)
    {
        $email = Vendor::where('email', $request->contact_person_email)->where('is_delete', 0)->first();

        return ! is_null($email) ? 'false' : 'true';
    }

    public function checkGstn(Request $request)
    {
        $gstn = Vendor::where('gstn', $request->gstn)->where('is_delete', 0)->first();

        return ! is_null($gstn) ? 'false' : 'true';
    }

    public function checkPan(Request $request)
    {
        $pan = Vendor::where('pan', $request->pan)->where('is_delete', 0)->first();

        return ! is_null($pan) ? 'false' : 'true';
    }

    public function index()
    {
        if (Auth::guard('vendor')->user()->status !== 'APPROVED') {
            return redirect(route('vendor.logout').'?access=blocked')->with('messages', [
                [
                    'type' => 'error',
                    'title' => 'Exhibitor',
                    'message' => 'Your profile is under approval or Your profile has been rejected, please contact PLEXPOINDIA 2024 team.',
                ],
            ]);
        }

        return view('vendor.dashboard.index');
    }
}
