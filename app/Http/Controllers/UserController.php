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
        return view('website.profile', ['customer' => $data]);
    }
    public function user_logout()
    {
        session()->pull('user_id');
        session()->pull('email');
        session()->pull('name');

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
        $validated = $request->validate([
            'name' => 'required|alpha:ascii',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:3|max:12',
        ]);

        $data = new news_user;

        $data->name = $request->name;
        $data->email = $request->email;
        $email = $data->email = $request->email;
        $data->password = Hash::make($request->password);


        $data->save();
        // $emaildata = array("name" => $request->name, "email" => $request->email, "password" => $request->password);
        // Mail::to($email)->send(new welcomemail($emaildata));
        session()->put('user_id', $data->id);
        session()->put('email', $data->email);
        session()->put('name', $data->name);
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
                session()->put('email', $data->email);
                session()->put('name', $data->name);

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
