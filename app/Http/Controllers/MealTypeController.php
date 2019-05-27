<?php

namespace App\Http\Controllers;

use App\MealType;
use Illuminate\Http\Request;
date_default_timezone_set("Asia/Taipei");
class MealTypeController extends Controller
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
     * @param  \App\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function show(MealType $mealType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function edit(MealType $mealType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MealType $mealType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MealType $mealType)
    {
        //
    }
}
