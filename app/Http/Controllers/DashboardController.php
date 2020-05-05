<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function profile()
    {
        return view("dashboard.pages-profile");
    }

    public function showErr(){
        return view("dashboard.err-404");
    }
    public function iconMaterial(){
        return view("dashboard.icon-material.blade.php");
    }



    public function tableBasic(){
        return view("dashboard.table-basic");
    }

}
