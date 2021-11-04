<?php

namespace App\Http\Controllers\Backend;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function AddPost(){
        $category = DB::table('categories')->get();
        $district = DB::table('district')->get();
        return view('backend.post.add_post',compact('category','district'));
    }


    public function PostView(){
        $post = DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->join('subcategories','posts.subcategory_id','subcategories.id')
        ->join('district','posts.district_id','district.id')
        ->join('subdistricts','posts.subdistrict_id','subdistricts.id')
        ->select('posts.*','categories.category_en','subcategories.subcategory_en','district.district_en','subdistricts.subdistrict_en')
        ->orderBy('id','desc')->paginate(4);
        //dd($post);
        return view('backend.post.post_view',compact('post'));
    
    }

    public function GetSubCategory($category_id){
        $sub = DB::table('subcategories')->where('category_id',$category_id)->get();
        return response()->json($sub);
    }


    public function GetSubDistrict($district_id){
        $sub = DB::table('subdistricts')->where('district_id',$district_id)->get();
        return response()->json($sub);
    }


    public function PostStore(Request $request){

        $validatedData = $request->validate([
            'category_id' => 'required',
            'district_id' => 'required',
        ]);

        $data = array();
        $data['title_en'] = $request->title_en;
        $data['title_bn'] = $request->title_bn;
        $data['user_id'] = Auth::id();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tags_en'] = $request->tags_en;
        $data['tags_bn'] = $request->tags_bn;
        $data['details_en'] = $request->details_en;
        $data['details_bn'] = $request->details_bn;
        $data['headline'] = $request->headline;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date("F");


       
        $image = $request->image;
        if($image) {
            $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
            Image::make($image)->resize(500,300)->save('upload/postimg/'.$image_one);
            $data['image'] = 'upload/postimg/'.$image_one;
            DB::table('posts')->insert($data);

            $notification = array(
             'message' => 'Post Inserted Successfully',
              'alert-type' => 'success'
           );

           return Redirect()->route('all.post')->with($notification);
        
        }else{
            return Redirect()->back();
        } // End Condition

    } //end method


    public function PostEdit($id){
        $post =DB::table('posts')->where('id',$id)->first();
        $category =DB::table('categories')->get();
        $subcategory =DB::table('subcategories')->get();
        $district =DB::table('district')->get();
        $subdistrict =DB::table('subdistricts')->get();
        return view('backend.post.post_edit',compact('post','category','subcategory','district','subdistrict'));
    }


    public function PostUpdate(Request $request,$id){

        $data = array();
        $data['title_en'] = $request->title_en;
        $data['title_bn'] = $request->title_bn;
        $data['user_id'] = Auth::id();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tags_en'] = $request->tags_en;
        $data['tags_bn'] = $request->tags_bn;
        $data['details_en'] = $request->details_en;
        $data['details_bn'] = $request->details_bn;
        $data['headline'] = $request->headline;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        
       
        $image = $request->image;
        $old_image = $request->oldimage;
  	 	if($image) {
  	 		$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
  	 		Image::make($image)->resize(500,300)->save('upload/postimg/'.$image_one);
  	 		$data['image'] = 'upload/postimg/'.$image_one;
  	 		// image/postimg/343434.png
  	 		DB::table('posts')->where('id',$id)->update($data);
  	 		unlink($old_image);

  	 		$notification = array(
    	 	'message' => 'Post Updated Successfully',
    	 	'alert-type' => 'success'
    	   );

    	 return Redirect()->route('all.post')->with($notification);
  	 	
  	 	}else{
            $data['title_en'] = $request->title_en;
            $data['title_bn'] = $request->title_bn;
            $data['user_id'] = Auth::id();
            $data['category_id'] = $request->category_id;
            $data['subcategory_id'] = $request->subcategory_id;
            $data['district_id'] = $request->district_id;
            $data['subdistrict_id'] = $request->subdistrict_id;
            $data['tags_en'] = $request->tags_en;
            $data['tags_bn'] = $request->tags_bn;
            $data['details_en'] = $request->details_en;
            $data['details_bn'] = $request->details_bn;
            $data['headline'] = $request->headline;
            $data['bigthumbnail'] = $request->bigthumbnail;
            $data['first_section'] = $request->first_section;
            $data['first_section_thumbnail'] = $request->first_section_thumbnail;
  	 		
  	 		DB::table('posts')->where('id',$id)->update($data);
  	 		 
  	 		$notification = array(
    	 	'message' =>'Post Updated without image Successfully',
    	 	'alert-type' => 'success'
    	    );

            return Redirect()->route('all.post')->with($notification);
  	 	} // End Condition

    }//end method

    public function PostDelete($id){
        $post = DB::table('posts')->where('id',$id)->first();
        unlink($post->image);
        DB::table('posts')->where('id',$id)->delete();

        $notification = array(
            'message' => 'Post Delete Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('all.post')->with($notification);
    }






}
