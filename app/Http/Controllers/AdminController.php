<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        $notfication = array(
            'message' => 'Yoy are loged out!',
            'alert-type' => 'info',

        );


        return redirect('/login')->with($notfication);
    }

    //  --------- Profile ----------
    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::findOrFail($id);

        return view('admin.admin_profile_view', compact('adminData'));
    }


    //  --------- Edit Profile ----------
    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::findOrFail($id);

        return view('admin.admin_profile_edit', compact('editData'));
    }


    //  --------- Edit Profile Update----------
    public function StoreProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/admin_images'),$filename);

            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        );


        return redirect()->route('admin.profile')->with($notification);
    }


    public function changePassword(){
        $id = Auth::user()->id;
        $data = User::findOrFail($id);


        return view('admin.admin_change_password', compact('data'));
    }

    public function updatePassword(Request $request ){
        $id = Auth::user()->id;
        $data = User::findOrFail($id);

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confrim_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = $data->password;

        if(Hash::check($request->oldpassword, $hashedPassword)){
            
            $data->password = bcrypt($request->newpassword);
            $data->save();

            session()->flash('message', 'Password successfully changed!');
            return redirect()->back();
 
        } else {
            session()->flash('message', 'Old password doesnt matched!');
            return redirect()->back();
        }

        

    }



}
