<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class IndexController extends Controller
{
    public function Bangla(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','bangla');
        return redirect()->back();
    }

    public function English(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }

    public function SinglePost($id){
        $post = DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->join('subcategories','posts.subcategory_id','subcategories.id')
        ->join('users','posts.user_id','users.id')
        ->select('posts.*','categories.category_en','categories.category_bn','subcategories.subcategory_en','subcategories.subcategory_bn','users.name')
        ->where('posts.id',$id)->first();
        //dd($post);
        return view('frontend.single_post',compact('post'));

    }//end method

    public function CategoywisePost($id,$category_en){
        $catpost = DB::table('posts')->where('category_id',$id)->orderBy('id','desc')->paginate(5);
        return view('frontend.category_post',compact('catpost'));

    }

    public function SubCategoywisePost($id,$subcategory_en){
        $subcatpost = DB::table('posts')->where('subcategory_id',$id)->orderBy('id','desc')->paginate(5);
        return view('frontend.subcategory_post',compact('subcatpost'));

    }

    public function SearchDistrict(Request $request){
        //dd($request->all());
        $districtid = $request->district_id;
        $subdistrictid = $request->subdistrict_id;
        $subcatpost = DB::table('posts')->where('district_id', $districtid)->where('subdistrict_id',$subdistrictid)->orderBy('id','desc')->paginate(5);
        return view('frontend.subcategory_post',compact('subcatpost'));
    }


}
