<?php

namespace Baristo\Http\Controllers;

use Baristo\SiteModel;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getAboutAdmin(){
        if(!SiteModel::where('content_type', 'about')->exists()){
            SiteModel::create(['content_type'=> 'about', 'content_data'=> 'About Us']);
        }

        $about = SiteModel::where('content_type', 'about')->first();

        return view('admin.about', ['about'=> $about]);
    }

    public function getAbout(){
        if(!SiteModel::where('content_type', 'about')->exists()){
            SiteModel::create(['content_type'=> 'about', 'content_data'=> 'About Us']);
        }

        $about = SiteModel::where('content_type', 'about')->first();

        return view('about', ['about'=>$about]);
    }

    public function saveAbout(Request $request){
        if(!SiteModel::where('content_type', 'about')->exists()){
            SiteModel::create(['content_type'=> 'about', 'content_data'=> 'About Us']);
        }

        SiteModel::where('content_type', 'about')->update(['content_data'=> $request->text]);

        return request()->json(['result'=>'success'], 200);
    }
}
