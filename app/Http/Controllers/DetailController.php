<?php

namespace App\Http\Controllers;
use Auth;
use App\Detail;
use App\Meal;
use App\Order;
use Illuminate\Http\Request;
date_default_timezone_set("Asia/Taipei");
class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $detail = Detail::join('meals','details.meal_id','=','meals.id')
            ->where('order_id',$id)
            ->select('details.id','details.meal_id','meals.name','details.quantity','details.status','details.updated_at','details.order_id')
            ->get();

        $data = ['detail' => $detail,];
        return view('backstage.chef.od.de.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail,$id,$deid)
    {
        $detail = Detail::find($deid);
        $data = ['detail' => $detail];
        $data2=['ss'=>$id];
        return view('backstage.chef.od.de.edit',$data,$data2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail,$id,$deid)
    {
        $detail = Detail::find($deid);
        $detail->status=$request->status;
        $detail->save();
        $data = ['ss'=>$id];
        return redirect()->route('backstage.chef.detail.index',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
