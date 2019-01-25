<?php

namespace App\Http\Controllers;

use Auth;
use App\Staff;
use Illuminate\Http\Request;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users=Staff::where('position',$request->position)->get();
        $data=['users'=>$users];
        return view('/auth/login11',$data);
    }
    public function login($id)
    {
        $user=Staff::find($id);

        $data=['user'=>$user];

        return view('/auth/login33',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        //
//    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
//    public function show(Staff $staff)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
//    public function edit(Staff $staff)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, Staff $staff)
//    {
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
//    public function destroy(Staff $staff)
//    {
//        //
//    }

    public function login2()
    {
        $position=Auth::user()->position;
        if($position == "經理"){
            return view('backstage.dashboard.index');
        }
        else{
            if($position == "櫃台") {
                return view('backstage.dashboard.index');
            }
            else
            {
                return view('backstage.chef.index');
            }
        }
    }

    public function logout()
    {
        return view('auth.login11');
    }

    public function index1()
    {
        $staffs=Staff::orderBy('id','ASC')->get();
        $data=['staff'=>$staffs];
        return view('backstage.manager.staff.index',$data);
    }

    public function create1()
    {
        return view('backstage.manager.staff.create');
    }

    public function store(Request $request)
    {
        $staff = new Staff();

        $staff->name = $request->name;
        $staff->position = $request->position;
        $staff->phone = $request->phone;
        $staff->address = $request->address;
        $staff->email = $request->email;
        $staff->password = bcrypt($request->password);

        $staff->save();
        return redirect('/backstage/manager/staff');
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
