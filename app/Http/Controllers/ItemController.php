<?php

namespace App\Http\Controllers;
use Auth;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $item = Item::join('meals','items.meal_id','=','meals.id')
            ->where('order_id',$id)
            ->select('items.id','items.meal_id','meals.name','items.quantity','items.status','items.updated_at','items.order_id')
            ->get();

        $data = ['item' => $item,];
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
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item,$id,$item_id)
    {
        $item = Item::find($item_id);
        $data = ['item' => $item];
        $data2=['ss'=>$id];
        return view('backstage.chef.od.de.edit',$data,$data2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item,$id,$item_id)
    {
        $item = Item::find($item_id);
        $item->status=$request->status;
        $item->save();
        $data = ['ss'=>$id];
        return redirect()->route('backstage.chef.detail.index',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
