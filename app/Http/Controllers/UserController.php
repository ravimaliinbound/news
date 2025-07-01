<?php

namespace App\Http\Controllers;

use App\Models\news_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserApproveMail;
use App\Mail\UserCancelMail;
use App\Mail\BlockUserMail;
use Illuminate\Support\Facades\File;

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
        return redirect()->route('index')->with('success', 'Logout Success !');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|min:3|max:15',
                'email' => 'required|email|unique:news_users',
                'password' => 'required|min:8|max:12',
                'image' => 'required'
            ],
            [
                'email.email' => 'Please enter a valid email',
                'email.unique' => 'Email has already been taken',
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
        return redirect()->route('index')->with('success', 'Signup request sent for approval !');
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

                if ($data->status == 'blocked') {
                    return redirect()->route('login')->with('error', 'User is currently blocked !');
                } 
                elseif ($data->status == 'pending') {
                    return redirect()->route('login')->with('error', 'Your login request is not approved yet !');
                } 
                else {
                    session()->put('user_id', $data->id);
                    return redirect()->route('index')->with('success', 'Login Success !');
                }
            } 
            else {
                return redirect()->route('login')->with('error', 'Password not match !');
            }
        } 
        else {
            return redirect()->route('login')->with('error', 'User does not exist !');
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
        $validated = $request->validate(
            [
                'name' => 'required|min:3|max:15',
                'email' => 'required|email',
            ],
        );
        $user = news_user::find(base64_decode($id));
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->file('image')) {

            // Remove stored image
            $filePath = 'website/upload/users/' . $user->image;
            if (File::exists(public_path($filePath))) {
                File::delete(public_path($filePath));
            }
            // Uploading image to folder
            $file = $request->file('image');
            $filename = time() . "_img." . $request->file('image')->getClientOriginalExtension();
            $file->move('website/upload/users/', $filename);
            $user->image = $filename;
        }
        $user->save();
        return redirect()->route('user-profile')->with('success', 'Profile updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the list of users.
     */
    public function show_users()
    {
        $users = news_user::where('status', 'pending')->get();
        return view('admin.approve_users', compact('users'));
    }
    public function manage_users()
    {
        $users = news_user::where('status', '!=', 'pending')
            ->where('status', '!=', 'cancel')
            ->get();
        return view('admin.manage_users', compact('users'));
    }
    public function approve_request(string $id)
    {
        $user = news_user::find(base64_decode($id));
        $user->status = 'approved';
        $email = $user->email;
        $name = $user->name;

        $user->save();
        $emaildata = array("name" => $name, "email" => $email);
        Mail::to($email)->send(new UserApproveMail($emaildata));
        return redirect()->route('show_users')->with('success', 'Request approved successfully !');
    }
    public function cancel_requset(string $id)
    {
        $user = news_user::find(base64_decode($id));
        $user->status = 'cancel';
        $name = $user->name;
        $email = $user->email;

        $user->save();
        $emaildata = array("name" => $name, "email" => $email);
        Mail::to($email)->send(new UserCancelMail($emaildata));
        return redirect()->route('show_users')->with('success', 'Request cancelled successfully !');
    }
    public function block_unblock_user(string $id)
    {
        $user = news_user::find(base64_decode($id));
        if ($user->status == 'blocked') {
            $user->status = 'approved';

            $user->save();
            return redirect()->route('manage_users')->with('success', 'User unblocked successfully !');
        } elseif ($user->status == 'approved') {
            $user->status = 'blocked';
            $name = $user->name;
            $email = $user->email;

            $user->save();
            $emaildata = array("name" => $name, "email" => $email);
            Mail::to($email)->send(new BlockUserMail($emaildata));
            return redirect()->route('manage_users')->with('success', 'User blocked successfully !');
        }
    }
}
