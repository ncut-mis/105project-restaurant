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
                        class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">

                    <font size="5"> 第{{$table->number}}桌</font>
                    <br>
                    <br>
                    等待確認餐點中
                </button>
            @endforeach


        </div>

    </div>






    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                                {{$category->name}}
                            </div>
                            <div class="col-md-4">
                                香煎鴨胸佐櫻桃紅酒醬
                                <br>
                                蒜香奶油肩胛菲力
                                <br>
                                海陸雙拼(雞腿+魚排)
                            </div>
                            <div class="col-md-1">
                                x2
                                <br>
                                x1
                                <br>
                                x1
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
