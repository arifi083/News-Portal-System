<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminLogout(){
        Auth::logout();
        return redirect()->route('login'); 
    }


    public function AccountSetting(){
        $id = Auth::user()->id;
    	$editData = User::find($id);
    	return view('backend.account.profile',compact('editData'));
    }


    public function ProfileEdit(){
    	$id = Auth::user()->id;
    	$editData = User::find($id);
    	return view('backend.account.profile_edit',compact('editData'));

    }


    public function ProfileStore(Request $request){

    	$data = User::find(Auth::user()->id);
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->gender = $request->gender;
    	$data->position = $request->position;
    	

    	if ($request->file('profile_photo_path')){
    		$file = $request->file('profile_photo_path');
    		@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$data['profile_photo_path'] = $filename;

    	}
    	$data->save();
    	 $notification = array(
    	 	'message' => 'User Profile Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('account.setting')->with($notification);
    }


    public function ShowPassword(){
    	return view('backend.account.show_password');
    }


    public function ChangePassword(Request $request){
        $validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }
        else{
            return redirect()->back();
        }
    }

 


    
}
