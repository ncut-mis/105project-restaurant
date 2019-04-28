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
    <script type="text/javascript">
        function kill() {
            document.getElementById("CheckTable").submit();//表单提交
        }
    </script>
    <script type="text/javascript">
        function checkDate(n) {
            $checkedCount = 0;
            for ($i = 0; $i < myForm.course.length; $i++) {

                if (myForm.course[i].checked) {

                    checkedCount++;

                }
            }

            if (checkedCount > n) {

                alert("不能选超过三门课程");

                return false;

            }
        }
    </script>
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
            <font color="#000000" size="5px" face="微軟正黑體">Step2->選擇座位</font>
        </div>
    </div>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
             aria-valuemax="100">50%
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        {{$num}}÷ 4,無條件進位數，然而該數值套在桌子上，意思是你能點選的桌子數
        </div>
    </div>
    <form class="col-md-12" role="form" id="CheckTable"
          action="{{ route('restaurant.table.check',Auth::user()->restaurant_id) }}">
        {{ csrf_field() }}
        <div class="theatre">
            <ol class="cabin">
                @for($i=1;$i<=5;$i++)
                    <li class="row row--{{$i}}">
                        <ol class="seats" type="A">
                            @for($k=1;$k<=10;$k++)
                                <li class="seat">
                                    @foreach($tables as $table)
                                        @if($table->row == $i && $table->col == $k)
                                            @if($table->status == "空閒中")
                                                <input type="checkbox" id="{{$table->number}}" name="check[]" onClick="return checkDate({{$num}})"
                                                       value="{{$table->number}}">
                                                {{--checked="checked"--}}
                                                <label for="{{$table->number}}">{{$i}}-{{$k}}<p>{{ $table->status }}
                                                </label>

                                            @else
                                                <input type="checkbox" disabled id="{{$table->number}}"/>
                                                <label for="{{$table->number}}">{{$i}}-{{$k}}<p>{{ $table->status }}
                                                </label>
                                            @endif
                                            @break
                                        @endif
                                    @endforeach
                                </li>
                            @endfor
                        </ol>
                    </li>
                @endfor
            </ol>
        </div>
        <input class="form-control col-md-6 hidden" type="text" name="people"  value="{{$num}}">
    </form>

    <div class="row">
        <div class="col-lg-12">
            <button type="submit" onclick="kill();" id="submit" style="text-decoration:none; float: right;"
                    class="btn btn-primary">下一步
            </button>
        </div>
    </div>
@endsection
