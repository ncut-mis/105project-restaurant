@extends('backstage.counter.layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">確認餐點_Check</font>
            </h1>
        </div>
    </div>

    @php($ans[]='')

    <div class="row">
        <div class="col-md-12 justify-content-center">

            @php($c=0)
            @php($b=0)

            @foreach($tables as $table)
                @php($c++)
            @endforeach

            @foreach($orders as $order)
                @if($c!=$b)
                    @php($a=0)
                    @foreach($numbers as $number)
                        @if($order->id == $number->order_id)
                            @foreach($tables as $table)
                                @if($number->table_id == $table->id)
                                    @if($a==0)
                                        @php($ans[]=$order->id)
                                        <button type="button"
                                                style="text-decoration:none; width:120px;height:120px; margin-top: 20px; margin-right: 20px"
                                                class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModalCenter{{$order->id}}">

                                            <font size="5"> 點單-{{$order->id}}</font>
                                            <br>
                                            <br>
                                            等待確認餐點中
                                        </button>
                                        @php($a++)
                                        @php($b++)
                                    @else
                                        @php($b++)
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    @foreach($ans as $an)
        <div class="modal fade" id="exampleModalCenter{{$an}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        @foreach($customers as $customer)
                            @foreach($orders as $order)
                                @if($order->id == $an)
                                    @if($customer->id == $order->customer_id)
                                        @if($customer->member_id == null)
                                            <h3><font face="微軟正黑體"><b>餐點狀態(非會員_編號-{{$customer->id}})</b></font></h3>
                                        @else
                                            @foreach($users as $user)
                                                @if($user->id == $customer->member_id)
                                                    <h3><font face="微軟正黑體"><b>餐點狀態(會員_{{$user->name}})</b></font></h3>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach

                    </div>
                    <div class="modal-body">


                        <div class="row " style="padding-top:10px">
                            <div class="col-md-6 col-md-offset-2">
                                @foreach($tables as $table)
                                    @foreach($numbers as $number)
                                        @if($table->id == $number->table_id)
                                            @if($number->order_id == $an)
                                                <button type="button"
                                                        style="text-decoration:none; width:60px;height:60px; margin-top: 20px; margin-right: 20px"
                                                        class="btn btn-danger">
                                                    <font size="1"> 第{{$table->number}}桌</font>
                                                </button>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        @foreach($categories as $category)
                            <div class="row" style="padding-top:10px;margin-top: 10px">
                                <div class="col-md-2">
                                </div>

                                <div class="col-md-2">
                                    @php($i=0)

                                    @foreach($items as $item)
                                        @if($item->order_id==$an)
                                            @if($item->meal->category_id == $category->id)
                                                @php($i=1)
                                            @endif
                                        @endif
                                    @endforeach

                                    @if($i==1)
                                        {{$category->name}}
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @foreach($items as $item)
                                        @if($item->order_id==$an)
                                            @if($item->meal->category_id == $category->id)
                                                {{$item->meal->name}}
                                                <br>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-1">
                                    @foreach($items as $item)
                                        @if($item->order_id==$an)
                                            @if($item->meal->category_id == $category->id)
                                                x{{$item->quantity}}
                                                <br>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">

                        {{--------------------}}
                        @foreach($tables as $table)
                            @foreach($numbers as $number)
                                @if($table->id == $number->table_id)
                                    @if($number->order_id == $an)
                                        {{--{{$table->number}}  這是要修改狀態的table.id--}}
                                    @endif
                                @endif
                            @endforeach
                        @endforeach


                        <button type="button" class="btn btn-primary" data-dismiss="modal">確認</button>
                        {{------------------------------}}

                        
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
