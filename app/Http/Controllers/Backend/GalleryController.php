<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class GalleryController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }


    public function PhotoGallery(){
        $photo = DB::table('photos')->orderBy('id','desc')->paginate(4);
        return view('backend.gallery.photos_view',compact('photo'));
    }

    public function AddPhoto(){
        return view('backend.gallery.add_photo');
    }

    public function PhotoStore(Request $request){

        $validatedData = $request->validate([
            'title' => 'required',
            'photo' => 'required',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        
       
        $image = $request->photo;
        if($image) {
            $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
            Image::make($image)->resize(500,300)->save('upload/photogallery/'.$image_one);
            $data['photo'] = 'upload/photogallery/'.$image_one;
            DB::table('photos')->insert($data);

            $notification = array(
             'message' => 'Photo Inserted Successfully',
              'alert-type' => 'success'
           );

           return Redirect()->route('photo.gallery')->with($notification);
        
        }else{
            return Redirect()->back();
        } // End Condition

    }//end method


    public function VideoGallery(){
        $video = DB::table('videos')->orderBy('id','desc')->paginate(3);
        return view('backend.gallery.video_view',compact('video'));
    }


    public function AddVideo(){
        return view('backend.gallery.add_video');
    }

    public function VideoStore(Request $request){

        $validatedData = $request->validate([
            'title' => 'required',
            'embed_code' => 'required',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
        DB::table('videos')->insert($data);

        $notification = array(
            'message' => 'Video Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('video.gallery')->with($notification);

    } //end method





}
