<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Staff;

class HomeController extends Controller
{
    public function index()
    {
        $rs=Restaurant::orderBy('id','ASC')->get();
        $data=['restaurants'=>$rs];
        return view('index',$data);
    }
    public function staff($id)
    {
        $rs=Restaurant::orderBy('id','ASC')->get();
        $data=['restaurants'=>$rs];
        $sts=Staff::where('res_id',$id)->get();
        $data2=['staffs'=>$sts];
        return view('auth.restaurantstaff',$data,$data2);

        /*$sts=Staff::where('res_id',$id)->get();
        $data=['staffs'=>$sts];
        return view('auth.restaurantstaff',$data);*/
    }

}
