<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use DB;
use Image;

class WebsiteSettingController extends Controller
{
    public function MainWebsetting(){
        $websitesetting = DB::table('websitesettings')->first();
        return view('backend.setting.website',compact('websitesetting'));

    }



    public function UpdateWebSetting(Request $request,$id){

        $data = array();
        $data['address_en'] = $request->address_en;
        $data['address_bn'] = $request->address_bn;
        $data['phone_en'] = $request->phone_en;
        $data['phone_bn'] = $request->phone_bn;
        $data['email'] = $request->email;
        
       
        $image = $request->logo;
        $old_image = $request->oldlogo;
  	 	if($image) {
  	 		$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
  	 		Image::make($image)->resize(320,130)->save('upload/logo/'.$image_one);
  	 		$data['logo'] = 'upload/logo/'.$image_one;
  	 		// image/postimg/343434.png
  	 		DB::table('websitesettings')->where('id',$id)->update($data);
  	 		unlink($old_image);

  	 		$notification = array(
    	 	'message' => 'Website Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('website.setting')->with($notification);
  	 	
  	 	}else{

            $data['address_en'] = $request->address_en;
            $data['address_bn'] = $request->address_bn;
            $data['phone_en'] = $request->phone_en;
            $data['phone_bn'] = $request->phone_bn;
            $data['email'] = $request->email;
            
  	 		
  	 		DB::table('websitesettings')->where('id',$id)->update($data);
  	 		 
  	 		$notification = array(
    	 	'message' =>'Website Updated without logo Successfully',
    	 	'alert-type' => 'success'
    	    );

            return Redirect()->route('website.setting')->with($notification);
  	 	} // End Condition

    }//end method


}
