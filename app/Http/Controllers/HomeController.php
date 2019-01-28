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
        $rs=Restaurant::find($id)->get();
        $data=['restaurants'=>$rs];
//        $sts=Staff::where('res_id',$id)->get();
//        $data2=['staffs'=>$sts];
//        return view('auth.restaurantstaff',$data,$data2);
        return view('auth.login11',$data);
    }

    public function chose(Request $request)
    {
        $users=Staff::where(['res_id'=>$request->res_id,'position'=>$request->position])->get();
        $data=['users'=>$users];
        return view('/auth/login22',$data);
    }
}
