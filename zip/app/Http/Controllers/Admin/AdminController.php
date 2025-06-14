<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\GlobalController;
use App\Models\Admin;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends GlobalController
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Index page
     *
     * @return to dashboard page
     */
    public function index()
    {
        return view('admin.dashboard.dashboard');
    }

    /**
     * Edit profile
     *
     * @param  mixed  $profile
     *
     * @return to edit profile page
     */
    public function editProfile()
    {
        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();

        return view('admin.dashboard.profile', compact('admin'));
    }

    /**
     * Update admin profile
     *
     * @param  $name,  $email, $mobile fields save in Admin database
     *
     * @return to index page with data store in Admin database
     */
    public function updateProfile(Request $request)
    {
        $update = Admin::findOrFail(Auth::guard('admin')->user()->id);
        // dd($update);
        $update->name = $request->name;
        $update->email = $request->email;
        /*if(isset($request->profile_image)){
            $fileName = $this->uploadImage($request->profile_image,'profile');
            $update->profile_image = $fileName;
        }*/
        $update->save();

        return redirect(route('admin.dashboard'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Profile',
                'message' => 'Profile successfully updated!',
            ],
        ]);
    }


    /**
     * Change admin password
     *
     * @return to change admin password page
     */
    public function changeAdminPassword()
    {
        return view('admin.dashboard.change_password');
    }

    /**
     * Update admin password
     *
     * @param  $password  field save in Admin database
     *
     * @return to index page with data store in Admin database
     */
    public function updateAdminPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        $adminId = Auth::guard('admin')->user()->id;
        $user = Admin::where('id', '=', $adminId)->first();

        if (Hash::check($request->old_password, $user->password)) {
            $users = Admin::findOrFail($adminId);
            $users->password = Hash::make($request->new_password);
            $users->save();

            return redirect(route('admin.dashboard'))->with('messages', [
                [
                    'type' => 'success',
                    'title' => 'Password',
                    'message' => 'Password Successfully changed',
                ],
            ]);
        }

        return redirect(route('admin.changeAdminPassword'))->with('messages', [
            [
                'type' => 'error',
                'title' => 'Password',
                'message' => 'Plese check your current password',
            ],
        ]);
    }
}
