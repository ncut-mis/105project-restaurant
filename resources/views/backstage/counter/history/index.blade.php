@extends('backstage.counter.layouts.master')
<head>
    <style>
        .style-four {
            height: 12px;
            border: 0;
            box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
@section('content')
    @php($as[]="")
    @php($account=0)
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">歷史用餐紀錄_History</font>
            </h1>
        </div>
    </div>

    <table class="table table-bordered table-hover">

        <tbody>
        <tr>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">顧客編號</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">會員</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">日期</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">入座時間</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">人數</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">桌號</font></h5>
            </td>
            <td bgcolor="gray" width="60px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">餐點</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">結帳金額</font></h5>
            </td>
        </tr>
        <tbody>
        @foreach($orders as $order)
            <tr>
                @foreach($customers as $customer)
                    @if($customer->id == $order->customer_id)
                        <td style="text-align: center">
                            {{$customer->id}}
                        </td>
                        <td style="text-align: center">
                            @php($d=0)
                            @foreach($users as $user)
                                @if($user->id == $customer->member_id)
                                    {{$user->name}}
                                    @php($d++)
                                @endif
                            @endforeach
                            @if($d==0)
                                非會員
                            @endif
                        </td>
                    @endif
                @endforeach
                <td style="text-align: center">{{date('Y/m/d',strtotime($order->StartTime))}}</td>
                <td style="text-align: center">{{date('H:i',strtotime($order->StartTime))}}</td>
                <td style="text-align: center">{{$order->number}}人</td>
                <td style="text-align: center">
                    @foreach($numbers as $number)
                        @if($number->order_id == $order->id)
                            @foreach($tables as $table)
                                @if($table->id == $number->table_id)
                                    第{{$table->number}}桌
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </td>
                <td style="text-align: center">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter{{$order->id}}">
                        詳細餐點
                    </button>
                </td>
                    @foreach($categories as $category)
                        @foreach($items as $item)
                            @if($item->order_id == $order->id)
                                @if($category->id == $item->meal->category_id)
                                    @php($t=$item->quantity*$item->meal->price)
                                    @php($as[] = $t)
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                    @foreach($as as $a)
                        @php($account=$account+(int)$a)
                    @endforeach
                <td style="text-align: center">
                    {{number_format($account)}}元
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Button trigger modal -->



    <!-- Modal -->
    @foreach($orders as $order)
        <div class="modal fade" id="exampleModalCenter{{$order->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        @php($g=0)
                        @foreach($customers as $customer)
                            @if($customer->id == $order->customer_id)
                                @foreach($users as $user)
                                    @if($customer->member_id == $user->id )
                                        <h3><font face="微軟正黑體"><b>餐點內容(會員_{{$user->name}})</b></font></h3>
                                        @php($g++)
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        @if($g==0)
                            <h3><font face="微軟正黑體"><b>餐點內容(非會員)</b></font></h3>
                        @endif
                    </div>
                    <div class="modal-body">
                        @foreach($categories as $category)
                            <div class="row" style="padding-top:10px">
                                <div class="col-md-2">
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
                                <div class="col-md-2">
                                    @foreach($items as $item)
                                        @if($item->order_id == $order->id)
                                            @if($category->id == $item->meal->category_id)
                                                {{$t=$item->quantity*$item->meal->price}}
                                                @php($as[] = $t)
                                                <br>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <div class="row" style="padding-top:10px">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8 style-four">
                                <p align=right><font face="微軟正黑體"><b>金額總計：{{number_format($account)}}元</b></font></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">確認</button>
                    </div>
                </div>
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
