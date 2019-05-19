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
            border: 1px solid #000;
            padding: 2px;
        }

        #capitals {
            width: 1069px;
            float: left;
            border: 1px solid #000;
            background-color: #E2EBED;
            padding: 3px;
            height: 280px;
        }

        #countries {
            width: 1150px;
            float: left;
            margin: 2px;
            height: 280px;
        }

        .dragableBox{
            width: 98px;
            height: 38px;
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
            width: 98px;
            height: 38px;
            border: 1px solid #000;
            background-color: #FFFF33;
            margin-bottom: 5px;
            margin-right: 5px;
            float: left;
            padding: 10px;
            font-weight: bold;
            text-align: center;
        }

        div.dragableBoxRight {
            height: 42px;
            width: 102px;

            padding: 1px;
            background-color: #E2EBED;
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

    <div id="mainContainer">





        <div id="countries">

            <div id="box101" class="dragableBoxRight"></div>
            <div id="box102" class="dragableBoxRight"></div>
            <div id="box103" class="dragableBoxRight"></div>
            <div id="box104" class="dragableBoxRight"></div>
            <div id="box105" class="dragableBoxRight"></div>
            <div id="box106" class="dragableBoxRight"></div>
            <div id="box107" class="dragableBoxRight"></div>
            <div id="box108" class="dragableBoxRight"></div>
            <div id="box109" class="dragableBoxRight"></div>
            @for($i=10;$i<51;$i++)
                <div id="box1{{$i}}" class="dragableBoxRight"></div>
            @endfor

        </div>
        <div id="capitals">
            <p><b>剩餘桌位</b></p>
            <div id="dropContent">
                @for($i=1;$i<51;$i++)
                    <div class="dragableBox green" id="box{{$i}}">桌位 {{$i}}</div>
                @endfor
            </div>
        </div>
        <div class="clear"></div>
        <div class="konaBody"></div>
    </div>

    <div id="debug"></div>


    <script src="{{ asset('js/seat.js') }}"></script>

@endsection