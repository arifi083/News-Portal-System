<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function CategoryView(){

        $category = DB::table('categories')->orderBy('id','desc')->paginate(3);
        return view('backend.category.category_view',compact('category'));
    }

    public function AddCategory(){
        return view('backend.category.add_category');
    }


    public function CategoryStore(Request $request){

        $validatedData = $request->validate([
            'category_en' => ['required', 'unique:categories', 'max:255'],
            'category_bn' => ['required', 'unique:categories', 'max:255'],
        ]);

        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_bn'] = $request->category_bn;
        DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'category Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.category')->with($notification);

    } //end method


    public function CategoryEdit($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('backend.category.edit_category',compact('category'));
    }



    public function CategoryUpdate(Request $request,$id){
       

        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_bn'] = $request->category_bn;
        DB::table('categories')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'category Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.category')->with($notification);

    } //end method


    public function CategoryDelete($id){
        DB::table('categories')->where('id',$id)->delete();
        $notification = array(
            'message' => 'category Delete Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->route('all.category')->with($notification);


    }



}
