@extends('backstage.counter.layouts.master')
<head>
    <style>
        *, *:before, *:after {
            box-sizing: border-box;
        }

        ::selection {
            background-color: #eee;
        }

        ::-moz-selection {
            background-color: #eee;
        }

        body {
            font-size: 16px;
            background-color: #269686;
        }

        .theatre {
            margin: 20px auto;
            width: 100%;
            max-width: 1500px;
            border-radius: 5px;
            background-color: #fff;
            padding: 20px 30px;
            box-shadow: 0px 0px 17px -4px #000;
        }

        ol {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .seats {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: flex-start;
        }

        .seat {
            display: flex;
            flex: 0 0 9.09%;
            height: 60px;
            padding: 5px;
            position: relative;
        }

        .seat:nth-child(5) {
            margin-right: 9.09%;
        }

        .seat input[type="checkbox"] {
            position: absolute;
            opacity: 0;
        }

        .seat input[type="checkbox"]:checked + label {
            background: #bada55;
            -webkit-animation-name: rubberBand;
            animation-name: rubberBand;
            animation-duration: 300ms;
            animation-fill-mode: both;
        }

        .seat input[type="checkbox"]:disabled + label {
            background: #ddd;
            text-indent: -9999px;
            overflow: hidden;
        }

        .seat input[type="checkbox"]:disabled + label:after {
            content: "X";
            text-indent: 0;
            position: absolute;
            top: 4px;
            left: 50%;
            transform: translate(-50%, 0%);
        }

        .seat input[type="checkbox"]:disabled + label:hover {
            box-shadow: none;
            cursor: not-allowed;
        }

        .seat label {
            display: block;
            position: relative;
            width: 100%;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            line-height: 1.5rem;
            padding: 4px 0;
            color: #fff;
            background: #26a69a;
            border-radius: 2px;
            animation-duration: 300ms;
            animation-fill-mode: both;
            transition-duration: 300ms;
        }

        .seat label:hover {
            cursor: pointer;
            box-shadow: 0px 0 7px 3px #ccc;
        }

        @-webkit-keyframes rubberBand {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                transform: scale3d(1.25, 0.75, 1);
            }
            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                transform: scale3d(0.75, 1.25, 1);
            }
            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                transform: scale3d(1.15, 0.85, 1);
            }
            65% {
                -webkit-transform: scale3d(0.95, 1.05, 1);
                transform: scale3d(0.95, 1.05, 1);
            }
            75% {
                -webkit-transform: scale3d(1.05, 0.95, 1);
                transform: scale3d(1.05, 0.95, 1);
            }
            100% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @keyframes rubberBand {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                transform: scale3d(1.25, 0.75, 1);
            }
            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                transform: scale3d(0.75, 1.25, 1);
            }
            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                transform: scale3d(1.15, 0.85, 1);
            }
            65% {
                -webkit-transform: scale3d(0.95, 1.05, 1);
                transform: scale3d(0.95, 1.05, 1);
            }
            75% {
                -webkit-transform: scale3d(1.05, 0.95, 1);
                transform: scale3d(1.05, 0.95, 1);
            }
            100% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        .rubberBand {
            -webkit-animation-name: rubberBand;
            animation-name: rubberBand;
        }
    </style>
</head>
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">新增訂位_Booking</font>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <font color="#000000" size="5px" face="微軟正黑體">Step1->訂位人數</font>
        </div>
    </div>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
             aria-valuemax="100">25%
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form class="col-md-12" role="form" id="CheckTable"
                  action="{{ route('restaurant.table.index',Auth::user()->restaurant_id) }}">
                {{ csrf_field() }}
                @for($i=1;$i<=10;$i++)
                    <button type="submit"
                            style="text-decoration:none; width:120px;height:120px; margin-top: 20px; margin-right: 20px"
                            name="num" value="{{$i}}"
                            class="btn btn-primary">{{$i}}人
                    </button>
                @endfor
            </form>
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
