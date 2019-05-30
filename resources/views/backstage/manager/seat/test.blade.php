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
                <font color="#000000" face="微軟正黑體">餐桌管理
                    <small>餐桌排列</small>
                </font>
            </h1>
        </div>
    </div>

    @php($n=216)
    @foreach($boxes as $box)
        第{{$n--}}桌，放在第幾號格子...{{$box}}
        <br>
    @endforeach





@endsection