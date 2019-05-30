@extends('backstage.counter.layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">用餐中_Dining</font>
            </h1>
        </div>
    </div>
    <table class="table table-bordered table-hover">

        <tbody>
        <tr>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">order編號</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">桌號</font></h5>
            </td>
            <td bgcolor="gray" width="60px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">餐點狀態</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">結帳</font></h5>
            </td>
        </tr>
        <tbody>
        @foreach($orders as $order)

            <tr>
                <td style="text-align: center">{{$order->id}}</td>
                <td style="text-align: center">
                    @php($d=0)
                    @foreach($numbers as $number)
                        @if($number->order_id == $order->id)
                            @foreach($tables as $table)
                                @if($table->id == $number->table_id)
                                    第{{$table->number}}桌
                                    @php($d++)
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </td>
                <td style="text-align: center">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter{{$order->id}}">
                        詳細餐點狀態
                    </button>
                </td>
                <td style="text-align: center">

                <a href="{{ route('counter.checkout',$order->id) }}" class="btn btn-info" style="text-decoration:none;">
                    <i class="fa fa-edit">結帳</i>
                </a></td>


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
                        <h3><font face="微軟正黑體"><b>餐點狀態</b></font></h3>
                    </div>
                    <div class="modal-body">
                        @foreach($categories as $category)
                            <div class="row" style="padding-top:10px">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-2">
                                    @php($f=0)
                                    @foreach($items as $item)
                                        @if($item->order_id == $order->id)
                                            @if($category->id == $item->category_id)
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
                                            @if($category->id == $item->category_id)
                                                {{$item->name}}
                                                <br>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-1">
                                    @foreach($items as $item)
                                        @if($item->order_id == $order->id)
                                            @if($category->id == $item->category_id)
                                                x{{$item->quantity}}
                                                <br>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-1">
                                    @foreach($items as $item)
                                        @if($item->order_id == $order->id)
                                            @if($category->id == $item->category_id)
                                                {{$item->quantity*$item->price}}
                                                <br>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-2">
                                    @foreach($items as $item)
                                        @if($item->order_id == $order->id)
                                            @if($category->id == $item->category_id)
                                                @if($item->status == 1)
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
