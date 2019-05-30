@extends('backstage.manager.layouts.master')
<head>
    <style>
        body {
            font-family: Trebuchet MS, Lucida Sans Unicode, Arial, sans-serif;
            font-size: 0.8em;
        }

        #mainContainer {
            width: 1075px;
            margin: 0 auto;
            /*margin-top: 10px;*/
            /*border: 1px solid #000;*/
            padding: 2px;
        }

        #capitals {
            width: 200px;
            float: left;
            border: 1px solid #000;
            background-color: #E2EBED;
            margin-top: 350px;
            padding: 50px;
            height: 200px;
            text-align: center;
            font-family:微軟正黑體;
        }

        #countries {
            width: 850px;
            float: left;
            margin-left:10px ;
            height: 550px;
            padding: 5px;
            border: 1px solid #000;
            background-size: 100%;
            background-position: top;
            background-repeat:no-repeat;
        }

        .dragableBox{
            width: 40px;
            height: 40px;
            border: 1px solid #000;
            background-color: #FFFF33;
            margin-bottom: 5px;
            margin-right: 5px;
            float: left;
            padding: 10px;
            font-weight: bold;
            text-align: center;
            position: absolute;

        }
        .dragableBox:hover {
            cursor: pointer;
        }
        .dragableBox.green {
            background: #7fc77e;
            color: #537a52;
        }
        .dragableBox.green:hover {
            background: #77e475;
        }

        .dragableBoxRight {
            width: 40px;
            height: 40px;
            /*border: 1px solid #000;*/
            /*background-color: #FFFF33;*/
            margin-bottom: 5px;
            margin-right: 5px;
            float: left;
            padding: 10px;
            font-weight: bold;
            text-align: center;
        }

        div.dragableBoxRight {
            height: 40px;
            width: 40px;

            padding: 1px;
            /*background-color: #E2EBED;*/
        }

        .dropBox {
            width: 190px;
            border: 1px solid #000;
            background-color: #E2EBED;
            height: 400px;
            margin-bottom: 10px;
            padding: 3px;
            overflow: auto;
        }

        a {
            color: #F00;
        }

        .clear {
            clear: both;
        }

        img {
            border: 0px;
        }
    </style>
</head>
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體"><i class="fa fa-table"></i> 餐桌管理 <small>餐桌排列</small></font>
            </h1>
        </div>
    </div>




    <div id="mainContainer">
        <div class="row" style="margin-bottom: 20px; text-align:right">
            <div class="col-lg-12">
                <div class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-plus-circle"></i> 上傳餐廳圖</font>
            </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="/backstage/table/{{Auth::user()->restaurant_id}}" method="POST" role="form" enctype ="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel" style="text-align: center"><font face="微軟正黑體">上傳餐廳室內圖</font></h4>
                            </div>

                                <div class="col-md-12" style="text-align:justify;text-justify: distribute;margin-top: 20px">
                                    <div class="form-group row{{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <label for="table_pic" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('室內圖') }}</font></label>
                                    <div class="col-md-8">
                                        <input type="file" name="table_pic" class="form-control" accept ="image/*">
                                    </div>
                                    </div>
                                </div>

                            <div class="modal-footer">
                                <div class="col-md-12" style="text-align: center;margin-top: 20px">
                                    <button type="submit" class="btn btn-primary">
                                        <font face="微軟正黑體">{{ __('送出') }}</font>
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <div id="capitals">
            <p style="font-size:20px"><b>桌位拖曳</b></p>

            <div id="dropContent">

                @for($i=1;$i<217;$i++)

                    <div class="dragableBox green" id="box{{$i}}">{{217-$i}}</div>

                @endfor
            </div>

        </div>
            <br>


        <div id="countries" style="background-image: url(/img/1.png)">

            <div id="bob101" class="dragableBoxRight"></div>
            <div id="bob102" class="dragableBoxRight"></div>
            <div id="bob103" class="dragableBoxRight"></div>
            <div id="bob104" class="dragableBoxRight"></div>
            <div id="bob105" class="dragableBoxRight"></div>
            <div id="bob106" class="dragableBoxRight"></div>
            <div id="bob107" class="dragableBoxRight"></div>
            <div id="bob108" class="dragableBoxRight"></div>
            <div id="bob109" class="dragableBoxRight"></div>
            @for($i=110;$i<317;$i++)
                <div id="bob{{$i}}" class="dragableBoxRight"></div>
            @endfor

        </div>


        <div class="clear"></div>
        <div class="konaBody"></div>
    </div>

    <div id="debug"></div>


    <script src="{{ asset('js/seat.js') }}"></script>

@endsection