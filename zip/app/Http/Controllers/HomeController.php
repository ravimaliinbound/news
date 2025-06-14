<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function checkGstn(Request $request)
    {
        $gstn = Inquiry::where('gstn', $request->gstn)->first();

        return ! is_null($gstn) ? 'false' : 'true';
    }

    public function checkPan(Request $request)
    {
        $pan = Inquiry::where('pan', $request->pan)->first();

        return ! is_null($pan) ? 'false' : 'true';
    }
}
