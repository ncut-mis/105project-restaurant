<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Auth;
use App\Staff;
use Illuminate\Http\Request;
class StaffController extends Controller
{
//    public function login($id)
//    {
//        $user=Staff::find($id);
//
//        $data=['user'=>$user];
//
//        return view('/auth/login33',$data);
//    }

    public function login2()
    {
        $position=Auth::user()->position;

        $restaurant_id=Auth::user()->restaurant_id;
        $open=Restaurant::where(['id'=>$restaurant_id])->value('open');
//echo $position,$open;
        if($position == "經理" && $open==0)
            return view('backstage.manager.index');
        else
            if($position == "櫃台" && $open==0)
                return redirect('backstage/counter/index');
            else
                if($position == "主廚" && $open==0)
                    return view('backstage.chef.index');
                echo "<script>alert('無此帳號或已被停權！若有任何問題，請與您的管理員聯絡！');location.href = '/logout';</script>";
//                redirect('/logout');
    }

    public function index()
    {
        $staff = Staff::where('restaurant_id', Auth::user()->restaurant_id)->get();
        return view('backstage.manager.staff.index', ['staff' => $staff]);
    }

    public function create()
    {
        return view('backstage.manager.staff.create');
    }

    public function store(Request $request)
    {
        Staff::create([
            'restaurant_id' => Auth::user()->restaurant_id,
            'name' => $request['name'],
            'position' => $request['position'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->route('backstage.manager.staff.index');
    }

    public function edit($id)
    {
        $staffs=Staff::find($id);
        $data = ['staff' => $staffs];
        return view('backstage.manager.staff.edit', $data);
    }

    public function update(Request $request,$id)
    {
        $staffs=Staff::find($id);

        $staffs->name = $request->name;
        $staffs->position = $request->position;
        $staffs->phone = $request->phone;
        $staffs->address = $request->address;
        $staffs->email = $request->email;
        $staffs->password = bcrypt($request->password);
        $staffs->save();
        return redirect()->route('backstage.manager.staff.index');
    }

    public function destroy($id)
    {
        Staff::destroy($id);
        return redirect()->route('backstage.manager.staff.index');
    }
}
