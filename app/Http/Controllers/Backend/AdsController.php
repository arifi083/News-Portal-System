<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class AdsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

     
    public function AdsList(){
        $ads=DB::table('ads')->orderBy('id','desc')->paginate(4);
        return view('backend.ads.adslist',compact('ads'));

    }

    public function AddAds(){
        return view('backend.ads.addads');
    }


    public function AdsStore(Request $request){
        $validatedData = $request->validate([
            'adds' => 'required',
        ]);

        $data = array();
        $data['link'] = $request->link;
      
        
        if($request->type == 1) { 

            $image = $request->adds;
            $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
            Image::make($image)->resize(970,90)->save('upload/ads/'.$image_one);
            $data['adds'] = 'upload/ads/'.$image_one;
            $data['type'] = 1;
            DB::table('ads')->insert($data);

            $notification = array(
             'message' => 'Horizontal ads Inserted Successfully',
              'alert-type' => 'success'
           );

           return Redirect()->route('ads.list')->with($notification);
        
        }else{

            $image = $request->adds;
            $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
            Image::make($image)->resize(500,500)->save('upload/ads/'.$image_one);
            $data['adds'] = 'upload/ads/'.$image_one;
            $data['type'] = 2;
            DB::table('ads')->insert($data);

            $notification = array(
             'message' => 'Vertical ads Inserted Successfully',
              'alert-type' => 'success'
           );

           return Redirect()->route('ads.list')->with($notification);
        
            

        } // End Condition

    }//end method


    public function AdsEdit($id){
        $ads = DB::table('ads')->where('id',$id)->first();
        return view('backend.ads.edit_ads',compact('ads')); 
    }



    public function UpdateAds(Request $request,$id){
        

        $data = array();
        $data['link'] = $request->link;
      
        $old_image = $request->oldads;
        if($request->type == 1) { 

            $image = $request->adds;
            $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
            Image::make($image)->resize(970,90)->save('upload/ads/'.$image_one);
            $data['adds'] = 'upload/ads/'.$image_one;
            $data['type'] = 1;
            DB::table('ads')->where('id',$id)->update($data);
            unlink($old_image);

            $notification = array(
             'message' => 'Horizontal ads updated Successfully',
              'alert-type' => 'success'
           );

           return Redirect()->route('ads.list')->with($notification);
        
        }else{

            $image = $request->adds;
            $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
            Image::make($image)->resize(500,500)->save('upload/ads/'.$image_one);
            $data['adds'] = 'upload/ads/'.$image_one;
            $data['type'] = 2;
            DB::table('ads')->where('id',$id)->update($data);
            unlink($old_image);

            $notification = array(
             'message' => 'Vertical ads Updated Successfully',
              'alert-type' => 'success'
           );

           return Redirect()->route('ads.list')->with($notification);
        
            

        } // End Condition

    }//end method

}
