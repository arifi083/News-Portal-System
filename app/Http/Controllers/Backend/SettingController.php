<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function SocialSetting(){
        $social = DB::table('socials')->first();
        return view('backend.setting.social',compact('social'));

    } 

    public function SocialUpdate(Request $request,$id){
       
        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedin'] = $request->linkedin;
        $data['instragram'] = $request->instragram;
        DB::table('socials')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Social Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('social.setting')->with($notification);

    } //end method

    
    public function SeoSetting(){
        $seo = DB::table('seo')->first();
        return view('backend.setting.seo',compact('seo'));

    }


    public function SeoUpdate(Request $request,$id){
       
        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;
        DB::table('seo')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Seo Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('seo.setting')->with($notification);

    } //end method



     
    public function PrayerSetting(){
        $prayer = DB::table('prayers')->first();
        return view('backend.setting.prayer',compact('prayer'));

    }


    public function PrayerUpdate(Request $request,$id){
       
        $data = array();
        $data['fajr'] = $request->fajr;
        $data['zuhar'] = $request->zuhar;
        $data['asar'] = $request->asar;
        $data['maghrib'] = $request->maghrib;
        $data['isha'] = $request->isha;
        $data['jummah'] = $request->jummah;
        
        DB::table('prayers')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Prayer Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('prayer.setting')->with($notification);

    } //end method



    public function LiveTvSetting(){
        $livetv = DB::table('livetvs')->first();
        return view('backend.setting.livetv',compact('livetv'));

    }


    public function LiveTvUpdate(Request $request,$id){
       
        $data = array();
        $data['embed_code'] = $request->embed_code; 
        DB::table('livetvs')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Live TV Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('livetv.setting')->with($notification);

    } //end method


    public function InActiveSetting($id){

        DB::table('livetvs')->where('id',$id)->update(['status'=>0]);

        $notification = array(
            'message' => 'Live TV Deactive Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function ActiveSetting($id){

        DB::table('livetvs')->where('id',$id)->update(['status'=>1]);

        $notification = array(
            'message' => 'Live TV Active Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }



    public function NoticeSetting(){
        $notices = DB::table('notices')->first();
        return view('backend.setting.notice',compact('notices'));
    }



    public function NoticeUpdate(Request $request,$id){
       
        $data = array();
        $data['notice'] = $request->notice; 
        DB::table('notices')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Notice Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('notice.setting')->with($notification);

    } //end method



    public function DeActiveNoticeSetting($id){

        DB::table('notices')->where('id',$id)->update(['status'=>0]);

        $notification = array(
            'message' => 'Notice Deactive Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function ActiveNoticeSetting($id){

        DB::table('notices')->where('id',$id)->update(['status'=>1]);

        $notification = array(
            'message' => 'Notice Active Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }



    public function WebsiteSetting(){
        $website = DB::table('websites')->orderBy('id','desc')->paginate(4);
        return view('backend.website.website_view',compact('website'));
    }

    public function AddWebsite(){
        return view('backend.website.add_website');
    }


    public function StoreWebsite(Request $request){


        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->insert($data);

        $notification = array(
            'message' => 'Website Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.website')->with($notification);

    } //end method










}
