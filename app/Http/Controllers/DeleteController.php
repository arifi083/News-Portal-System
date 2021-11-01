<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DeleteController extends Controller
{
    public function OnDelete(){
        $result=DB::table('subdistricts')->truncate();
    }
}
