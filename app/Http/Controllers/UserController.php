<?php

namespace App\Http\Controllers;

use App\Models\news_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
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
        return view('website.login');
    }
    public function signup()
    {
        return view('website.signup');
    }
    public function user_profile()
    {
        return view('website.profile');
    }

    public function profile()
    {
        $id = session()->get('user_id');
        $data = news_user::where('id', $id)->first();
        return view('website.profile', ['user' => $data]);
    }
    public function user_logout()
    {
        session()->pull('user_id');

        echo "<script>
        alert('Logout Success !');
        window.location='/';
     </script>";
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|alpha:ascii|min:3|max:15',
                'email' => 'required|email|unique:news_users',
                'password' => 'required|min:8|max:12',
                'image' => 'required'
            ],
            [
                'name.required' => 'Name field is required',
                'email.required' => 'Email field is required',
                'email.email' => 'Please enter a valid email',
                'email.unique' => 'Email has already been taken',
                'password.required' => 'Password field is required',
            ]
        );

        $data = new news_user;

        $data->name = $request->name;
        $data->email = $request->email;
        $email = $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $file = $request->file('image');
        $filename = time() . "_img." . $request->file('image')->getClientOriginalExtension();
        $file->move('website/upload/users/', $filename);
        $data->image = $filename;

        $data->save();
        // $emaildata = array("name" => $request->name, "email" => $request->email, "password" => $request->password);
        // Mail::to($email)->send(new welcomemail($emaildata));
        session()->put('user_id', $data->id);
        echo "<script>
        alert('Signup Success !');
        window.location='/index';
        </script>";
    }

    public function user_auth(Request $request)
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

        $data = news_user::where('email', $email)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                session()->put('user_id', $data->id);

                echo "<script> 
                    alert('Login Suuceess !');
                    window.location='/';
                    </script>";
            } else {
                echo "<script> 
                        alert('Password not match !'); 
                        window.location='/login';
                    </script>";
            }
        } else {
            echo "<script>
                alert('User does not exist !');
                window.location='/login';
             </script>";
        }
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
        $user = news_user::find(base64_decode($id));
        return view('website.edit', compact('user'));
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
