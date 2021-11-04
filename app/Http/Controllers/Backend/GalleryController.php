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


    public function PhotoEdit($id){
        $photo = DB::table('photos')->where('id',$id)->first();
        return view('backend.gallery.edit_photo',compact('photo'));
    }



    public function Updatephoto(Request $request,$id){

        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;
       
        
        $image = $request->photo;
        $old_image = $request->oldphoto;
  	 	if($image) {
  	 		$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
  	 		Image::make($image)->resize(500,300)->save('upload/photogallery/'.$image_one);
  	 		$data['photo'] = 'upload/photogallery/'.$image_one;
  	 		// image/postimg/343434.png
  	 		DB::table('photos')->where('id',$id)->update($data);
  	 		unlink($old_image);

  	 		$notification = array(
    	 	'message' => 'photo Updated Successfully',
    	 	'alert-type' => 'success'
    	   );

    	 return redirect()->route('photo.gallery')->with($notification);
  	 	
  	 	}else{
            $data['title'] = $request->title;
            $data['type'] = $request->type;
            DB::table('photos')->where('id',$id)->update($data);

            $notification = array(
                'message' =>'Photo Updated without image Successfully',
                'alert-type' => 'success'
            );
            
            return redirect()->route('photo.gallery')->with($notification);

  	 	} // End Condition

    }//end method


    public function PhotoDelete($id){
        $photo = DB::table('photos')->where('id',$id)->first();
        unlink($photo->photo);
        DB::table('photos')->where('id',$id)->delete();

        $notification = array(
            'message' => 'Photo Delete Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('photo.gallery')->with($notification);
    }



    public function VideoEdit($id){
        $video = DB::table('videos')->where('id',$id)->first();
        return view('backend.gallery.edit_video',compact('video'));
    }



    public function UpdateVideo(Request $request,$id){

        $data = array();
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
        DB::table('videos')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Video Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('video.gallery')->with($notification);

    } //end method


    public function VideoDelete($id){
        DB::table('videos')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Video Delete Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('video.gallery')->with($notification);

    }









}
