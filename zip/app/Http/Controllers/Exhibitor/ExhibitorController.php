<?php

namespace App\Http\Controllers\Exhibitor;

use App\Http\Controllers\GlobalController;
use App\Jobs\SendSignupEmail;
use App\Models\Exhibitor;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExhibitorController extends GlobalController
{
    public function __construct()
    {
        $this->middleware('exhibitor', ['except' => ['register', 'postRegister', 'checkEmail']]);
    }

    public function register()
    {
        return view('exhibitor.auth.register');
    }

    public function postRegister(Request $request)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $data = [
            'secret' => '6LclcsopAAAAAIeOWiM_az0YsTSM7Sj8x0EZhr73',
            'response' => $request->get('recaptcha'),
            'remoteip' => $remoteip,
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        if ($resultJson->success === true) {
            $exhibitor = new Exhibitor();
            $exhibitor->user_ip = $request->ip();
            $exhibitor->company_name = $request->company_name;
            $exhibitor->country_id = $request->country_id;
            $exhibitor->contact_person_name = $request->contact_person;
            $exhibitor->contact_person_mobile = $request->mobile_number;
            $exhibitor->email = $request->email;
            $exhibitor->password = bcrypt($request->password);
            $exhibitor->save();

            $ex = Exhibitor::where('id', $exhibitor->id)->first();

            try {
                SendSignupEmail::dispatch($request->company_name, $request->email)->delay(now()->addSeconds(5));
            } catch (Exception $e) {
                \Log::info($e);
            }

            Auth::guard('exhibitor')->login($ex);

            return redirect(route('exhibitor.dashboard'))->with('messages', [
                [
                    'type' => 'success',
                    'title' => 'Exhibitor',
                    'message' => 'Exhibitor registration successfully',
                ],
            ]);
        }
        return redirect()->back()->with('messages', [
            [
                'type' => 'success',
                'title' => 'Exhibitor',
                'message' => 'Captcha error',
            ],
        ]);
    }

    public function checkEmail(Request $request)
    {
        $email = Exhibitor::where('email', $request->email)->where('is_delete', 0)->first();

        return ! is_null($email) ? 'false' : 'true';
    }

    public function dashboard()
    {
        $inquiry = Inquiry::where('exhibitor_id', Auth::guard('exhibitor')->user()->id)->first();

        if (is_null($inquiry)) {
            return redirect(route('exhibitor.details'));
        }

        if (Auth::guard('exhibitor')->user()->is_blocked === 1) {
            return redirect(route('exhibitor.logout').'?access=blocked')->with('messages', [
                [
                    'type' => 'error',
                    'title' => 'Exhibitor',
                    'message' => 'Your inquiry has beed rejected, please get in touch with PLEXPOINDIA Management Team on 079-40399463, info@plexpoindia.org',
                ],
            ]);
        }

        return view('exhibitor.dashboard.dashboard');
    }

    public function bankDetails()
    {
        return view('exhibitor.dashboard.bank_details');
    }
}
