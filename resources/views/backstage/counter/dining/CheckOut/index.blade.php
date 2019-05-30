@extends('backstage.counter.layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">結帳_CheckOut</font>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <font color="#000000" size="5px" face="微軟正黑體">Step1->確定餐點內容</font>
        </div>
    </div>

    @foreach($orders as $order)
        {{$order->id}}
        @if($order->id == $check)
            {{$check}}
        @endif
    @endforeach

    @foreach($orders as $order)


            {{$order->id}}
            <div class="card">
                <div class="card-header">
                    @php($g=0)
                    @foreach($customers as $customer)
                        @if($customer->id == $order->customer_id)
                            @foreach($users as $user)
                                @if($customer->member_id == $user->id )
                                    <h3><font face="微軟正黑體"><b>餐點狀態(會員_{{$user->name}})</b></font></h3>
                                    @php($g++)
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if($g==0)
                        <h3><font face="微軟正黑體"><b>餐點狀態(非會員)</b></font></h3>
                    @endif
                </div>
                <div class="card-body">
                    @foreach($categories as $category)
                        <div class="row" style="padding-top:10px">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                @php($f=0)
                                @foreach($items as $item)
                                    @if($item->order_id == $order->id)
                                        @if($category->id == $item->meal->category_id)
                                            @php($f++)
                                        @endif
                                    @endif
                                @endforeach

                                @if($f!=0)
                                    {{$category->name}}
                                @endif
                            </div>
                            <div class="col-md-4">
                                @foreach($items as $item)
                                    @if($item->order_id == $order->id)
                                        @if($category->id == $item->meal->category_id)
                                            {{$item->meal->name}}
                                            <br>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-1">
                                @foreach($items as $item)
                                    @if($item->order_id == $order->id)
                                        @if($category->id == $item->meal->category_id)
                                            x{{$item->quantity}}
                                            <br>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-1">
                                @foreach($items as $item)
                                    @if($item->order_id == $order->id)
                                        @if($category->id == $item->meal->category_id)
                                            {{$item->quantity*$item->meal->price}}
                                            <br>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-2">
                                @foreach($items as $item)
                                    @if($item->order_id == $order->id)
                                        @if($category->id == $item->meal->category_id)
                                            @if($item->status == 0)
                                                <span style="color:WHITE; background-color:#FF0000">->製作中</span>
                                            @else
                                                ->已上菜
                                            @endif
                                            <br>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">確認</button>
                </div>
            </div>


    @endforeach




    <div class="row">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
@endsection
