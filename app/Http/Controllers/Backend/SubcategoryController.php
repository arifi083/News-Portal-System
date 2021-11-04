<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubcategoryController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
 
    public function SubcategoryView(){

        $subcategory = DB::table('subcategories')
        ->join('categories','subcategories.category_id','categories.id')
        ->select('subcategories.*','categories.category_en')
        ->orderBy('id','desc')->paginate(3);
        return view('backend.subcategory.subcategory_view',compact('subcategory'));
    }

    public function AddSubcategory(){
        $category = DB::table('categories')->get();
        return view('backend.subcategory.add_subcategory',compact('category'));
    }


    public function SubcategoryStore(Request $request){

        $validatedData = $request->validate([
            'subcategory_en' => ['required', 'unique:subcategories', 'max:255'],
            'subcategory_bn' => ['required', 'unique:subcategories', 'max:255'],
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_bn'] = $request->subcategory_bn;
        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'Subcategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.subcategory')->with($notification);

    } //end method


    public function SubCategoryEdit($id){
        $subcategory = DB::table('subcategories')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('backend.subcategory.edit_subcategory',compact('subcategory','category'));
    }


    public function SubCategoryUpdate(Request $request,$id){
       

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_bn'] = $request->subcategory_bn;
        DB::table('subcategories')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Subcategory Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.subcategory')->with($notification);

    } //end method


    public function SubCategoryDelete($id){
        DB::table('subcategories')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Subcategory Delete Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->route('all.subcategory')->with($notification);


    }
 



}
