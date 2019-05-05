<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Staff;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
