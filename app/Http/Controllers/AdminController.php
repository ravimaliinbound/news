<?php

namespace App\Http\Controllers;
use App\Models\news_admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Admin Authentication.
     */
    public function admin_auth(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|'
        ], [
            'email.required' => 'Email field is required',
            'email.email' => 'Please enter a valid email',
            'password.required' => 'Password field is required',
        ]);

        $email = $request->adm_email;
        $password = $request->adm_password;

        $data = news_admin::where('email', $email)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                session()->put('admin_id', $data->id);
                session()->put('admin_email', $data->email);
                session()->put('admin_name', $data->name);

                echo "<script> 
                    alert('Login Suuceess !');
                    window.location='/dashboard';
                    </script>";
            } else {
                echo "<script> 
                        alert('Password not match !'); 
                        window.location='/admin-login';
                    </script>";
            }
        } else {
            echo "<script>
                alert('Admin does not exist !');
                window.location='admin-login';
             </script>";
        }
    }

    /**
     * Admin Logout.
     */
    public function admin_logout()
    {
        session()->pull('admin_id');
        session()->pull('admin_email');
        session()->pull('admin_name');

        echo "<script>
        alert('Logout Success !');
        window.location='/';
     </script>";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
