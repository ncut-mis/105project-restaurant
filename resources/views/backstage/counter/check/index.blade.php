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





    <div class="row">
        <div class="col-lg-12 justify-content-center">

            @foreach($tables as $table)
                <button type="button"
                        style="text-decoration:none; width:120px;height:120px; margin-top: 20px; margin-right: 20px"
                        class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$table->id}}">

                    <font size="5"> 第{{$table->number}}桌</font>
                    <br>
                    @foreach($numbers as $number)
                        @if($number->table_id==$table->id)
                            @foreach($items as $item)
                                @if($item->order_id==$number->order_id)
                                    @if($item->meal->category_id == $category->id)
                                        @php($i=1)
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    <br>
                    等待確認餐點中
                </button>
            @endforeach


        </div>

    </div>






    <!-- Modal -->
    @foreach($tables as $table)
        <div class="modal fade" id="exampleModalCenter{{$table->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3><font face="微軟正黑體"><b>餐點狀態(會員_李千那)</b></font></h3>
                    </div>
                    <div class="modal-body">

                        @foreach($categories as $category)
                            <div class="row" style="padding-top:10px">
                                <div class="col-md-2">
                                </div>

                                <div class="col-md-2">
                                    @php($i=0)
                                    @foreach($numbers as $number)
                                        @if($number->table_id==$table->id)
                                            @foreach($items as $item)
                                                @if($item->order_id==$number->order_id)
                                                    @if($item->meal->category_id == $category->id)
                                                        @php($i=1)
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                    @if($i==1)
                                        {{$category->name}}
                                    @endif

                                </div>
                                <div class="col-md-4">
                                    @foreach($numbers as $number)
                                        @if($number->table_id==$table->id)
                                            @foreach($items as $item)
                                                @if($item->order_id==$number->order_id)
                                                    @if($item->meal->category_id == $category->id)
                                                        {{$item->meal->name}}
                                                        <br>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-1">
                                    @foreach($numbers as $number)
                                        @if($number->table_id==$table->id)
                                            @foreach($items as $item)
                                                @if($item->order_id==$number->order_id)
                                                    @if($item->meal->category_id == $category->id)
                                                        x{{$item->quantity}}
                                                        <br>
                                                    @endif
                                                @endif
                                            @endforeach
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
