<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->get();
        $data = ['users' => $users];
        return view('/auth/login22', $data);
    }

    public function login($id)
    {
        $user = User::find($id);

        $data = ['user' => $user];

        return view('/auth/login33', $data);
    }
}