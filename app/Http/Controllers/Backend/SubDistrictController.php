<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubDistrictController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    
    public function SubDistrictView(){

        $subdistrict = DB::table('subdistricts')
        ->join('district','subdistricts.district_id','district.id')
        ->select('subdistricts.*','district.district_en')
        ->orderBy('id','desc')->paginate(4);
        return view('backend.subdistrict.subdistrict_view',compact('subdistrict'));
    }


    public function AddSubDistrict(){
        $district = DB::table('district')->get();
        return view('backend.subdistrict.add_subdistrict',compact('district'));
    }


    public function SubDistrictStore(Request $request){

        $validatedData = $request->validate([
            'subdistrict_en' => ['required', 'unique:subdistricts', 'max:255'],
            'subdistrict_bn' => ['required', 'unique:subdistricts', 'max:255'],
        ]);

        $data = array();
        $data['district_id'] = $request->district_id;
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_bn'] = $request->subdistrict_bn;
        DB::table('subdistricts')->insert($data);

        $notification = array(
            'message' => 'SubDistrict Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.subdistrict')->with($notification);

    } //end method


    public function SubDistrictEdit($id){
        $subdistrict = DB::table('subdistricts')->where('id',$id)->first();
        $district = DB::table('district')->get();
        return view('backend.subdistrict.edit_subdistrict',compact('subdistrict','district'));
    }



    public function SubDistrictUpdate(Request $request,$id){
       
        $data = array();
        $data['district_id'] = $request->district_id;
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_bn'] = $request->subdistrict_bn;
        DB::table('subdistricts')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'SubDistrict Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.subdistrict')->with($notification);

    } //end method


    public function SubDistrictDelete($id){
        DB::table('subdistricts')->where('id',$id)->delete();
        $notification = array(
            'message' => 'SubDistrict Delete Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('all.subdistrict')->with($notification);
    }






}
