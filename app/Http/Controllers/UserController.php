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

        echo "<script>
        alert('Signup success. Request sent for approval!');
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
                if ($data->status == 'blocked') {
                    echo "<script> 
                        alert('User is currently blocked !'); 
                        window.location='/login';
                    </script>";
                } elseif ($data->status == 'pending') {
                    echo "<script> 
                        alert('Your login request is not approved yet !'); 
                        window.location='/login';
                    </script>";
                } else {
                    session()->put('user_id', $data->id);

                    echo "<script> 
                    alert('Login Suuceess !');
                    window.location='/';
                    </script>";
                }
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
        echo "<script>
                alert('Profile updated successfully !');
                window.location='/user-profile';
                </script>";
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
        echo "<script>
                alert('Request approved !');
                window.location='/show_users';
                </script>";
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
        echo "<script>
                alert('Request cancelled !');
                window.location='/show_users';
                </script>";
    }
    public function block_unblock_user(string $id)
    {
        $user = news_user::find(base64_decode($id));
        if ($user->status == 'blocked') {
            $user->status = 'approved';

            $user->save();
            echo "<script>
                alert('User unblocked !');
                window.location='/manage_users';
                </script>";
        } elseif ($user->status == 'approved') {
            $user->status = 'blocked';
            $name = $user->name;
            $email = $user->email;

            $user->save();
            $emaildata = array("name" => $name, "email" => $email);
            Mail::to($email)->send(new BlockUserMail($emaildata));
            echo "<script>
                alert('User blocked !');
                window.location='/manage_users';
                </script>";
        }
    }
}
