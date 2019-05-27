<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Staff;
date_default_timezone_set("Asia/Taipei");
class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
