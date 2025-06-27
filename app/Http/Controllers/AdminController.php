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
        $admins = news_admin::get();
        return view('admin.index', compact('admins'));
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

        $email = $request->email;
        $password = $request->password;
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
        window.location='/admin-login';
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
    public function manage_profile()
    {
        $id = session()->get('admin_id');
        $admin = news_admin::find($id);
        return view('admin.manage_profile', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|min:3|max:15',
                'email' => 'required|email',
            ]
        );
        $id = session()->get('admin_id');
        
        session()->put('admin_name', $request->name);
        session()->put('admin_email', $request->email);
        $admin = news_admin::find($id);

        $admin->name = $request->name;
        $admin->email = $request->email;

        $admin->save();
        echo "<script>
        alert('Profile updated successfully !');
        window.location='/dashboard';
        </script>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
