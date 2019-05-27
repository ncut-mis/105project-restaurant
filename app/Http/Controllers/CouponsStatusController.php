<?php

namespace App\Http\Controllers;

use App\CouponsStatus;
use Illuminate\Http\Request;
date_default_timezone_set("Asia/Taipei");
class CouponsStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\CouponsStatus  $couponsStatus
     * @return \Illuminate\Http\Response
     */
    public function show(CouponsStatus $couponsStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CouponsStatus  $couponsStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponsStatus $couponsStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CouponsStatus  $couponsStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CouponsStatus $couponsStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CouponsStatus  $couponsStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponsStatus $couponsStatus)
    {
        //
    }
}
