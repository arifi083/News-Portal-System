<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DistrictController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function DistrictView(){

        $district = DB::table('district')->orderBy('id','desc')->paginate(4);
        return view('backend.district.district_view',compact('district'));
    }

    public function AddDistrict(){
        return view('backend.district.add_district');
    }


    public function DistrictStore(Request $request){

        $validatedData = $request->validate([
            'district_en' => ['required', 'unique:district', 'max:255'],
            'district_bn' => ['required', 'unique:district', 'max:255'],
        ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_bn'] = $request->district_bn;
        DB::table('district')->insert($data);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.district')->with($notification);

    } //end method



    public function DistrictEdit($id){
        $district = DB::table('district')->where('id',$id)->first();
        return view('backend.district.edit_district',compact('district'));
    }



    public function DistrictUpdate(Request $request,$id){

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_bn'] = $request->district_bn;
        DB::table('district')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.district')->with($notification);

    } //end method


    public function DistrictDelete($id){
        DB::table('district')->where('id',$id)->delete();

        $notification = array(
            'message' => 'District Delete Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->route('all.district')->with($notification);

    }





}
