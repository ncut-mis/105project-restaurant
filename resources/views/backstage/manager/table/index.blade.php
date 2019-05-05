@extends('backstage.manager.layouts.master')
@section('content')

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
                /*background-color: #269686;*/
            }
            /*背框*/
            .theatre {
                margin: 20px auto;
                width: 100%;
                max-width: 1100px;
                border-radius: 5px;
                background-color: #fff;
                padding: 20px 15px;
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
                justify-content: center;
            }
            .seat {
                display: flex;
                flex: 0 0 14.28571%;
                padding: 5px;
                position: relative;
            }
            .seat:nth-child(3) {
                margin-right: 14.28571%;
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
{{--<style>--}}
    {{--.grid-columns:{12}--}}
    {{--.grid-gutter-width: 30px;--}}

    {{--.grid-breakpoints:{(--}}
    {{--xs: 0px,--}}
    {{--sm: 576px,--}}
    {{--md: 768px,--}}
    {{--lg: 992px,--}}
    {{--xl: 1200px--}}
    {{--)}--}}

    {{--$container-max-widths: (--}}
    {{--sm: 540px,--}}
    {{--md: 720px,--}}
    {{--lg: 960px,--}}
    {{--xl: 1140px--}}
    {{--);--}}

{{--</style>--}}
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體"><i class="fa fa-table"></i>　餐桌管理 <small>所有餐桌列表</small></font>
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row justify-content-center" style="margin-bottom: 20px; text-align:right">
    <div class="col-lg-12">
        <a href="{{ route('backstage.manager.table.create') }}" class="btn btn-success"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-plus-circle"></i> 新增餐桌</font></a>
    </div>
</div>
<!-- /.row -->
<font color="#000000" face="微軟正黑體" style="text-align: center">
{{--<div class="row">--}}


    {{--<div class="container-fluid">--}}
        {{--<div class="row">--}}
            {{--@foreach ($tables as $tbs)--}}
            {{--<div class="col-sm-1" style="background-color: #ffe924;padding-left:2px">--}}
                {{--第{{$tbs->table}}桌<br>{{$tbs->people}}人座--}}
            {{--</div>@endforeach--}}
            {{--<div class="row">--}}
            {{--<div class="col-sm">--}}
                {{--One of three columns--}}
            {{--</div>--}}
            {{--<div class="col-sm">--}}
                {{--One of three columns--}}
            {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


    <div class="theatre">
        <ol class="cabin">
            <li class="row row--1">
                <ol class="seats" type="A">
                    {{--@for ($i = 1; $i < 13; $i=$i+2)--}}
                    {{--<li class="seat">--}}
                    {{--<input type="checkbox" id={{$i}} />--}}
                    {{--<label for={{$i}}>{{$i}}</label>--}}
                    {{--</li>--}}
                    {{--@endfor--}}
                        {{--<br>--}}
                    {{--@foreach ($tables as $tbs)--}}
                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="1A">1A</label>
                        </li>
                    {{--@endforeach--}}
                    <li class="seat">
                    <input type="checkbox" id="1B" />
                    <label for="1B">1B</label>
                    </li>
                    <li class="seat">
                    <input type="checkbox" id="1C" />
                    <label for="1C">1C</label>
                    </li>
                    <li class="seat">
                    <input type="checkbox" id="1D" />
                    <label for="1D">1D</label>
                    </li>
                    <li class="seat">
                    <input type="checkbox" id="1E" />
                    <label for="1E">1E</label>
                    </li>
                    <li class="seat">
                    <input type="checkbox" id="1F" />
                    <label for="1F">1F</label>
                    </li>
                </ol>
            </li>
        </ol>
    </div>

    {{--<div class="col-lg-2"></div>--}}
    {{--<div class="col-lg-8">--}}
        {{--<div class="table-responsive">--}}
            {{--<table class="table table-bordered table-hover">--}}
                {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th width="50" style="text-align: center">編號</th>--}}
                        {{--<th width="80" style="text-align: center">桌號</th>--}}
                        {{--<th width="80" style="text-align: center">座位人數</th>--}}
                        {{--<th width="80" style="text-align: center">使用狀態</th>--}}
                        {{--<th width="80" style="text-align: center">修改</th>--}}
                        {{--<th width="80" style="text-align: center">刪除</th>--}}
                    {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--@foreach($tables as $tbs)--}}
                    {{--<tr>--}}
                        {{--<td>{{$tbs->id}}</td>--}}
                        {{--<td>{{$tbs->table}}</td>--}}
                        {{--<td>{{$tbs->people}}</td>--}}
                        {{--<td>{{$tbs->status}}</td>--}}
                        {{--<td><a href="{{ route('backstage.manager.table.edit',$tbs->id) }}" class="btn btn-info" style="text-decoration:none;">修改</a></td>--}}
                        {{--<td><form action="{{ route('backstage.manager.table.destroy', $tbs->id) }}" method="POST">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--{{ method_field('DELETE') }}--}}
                                {{--<button  class="btn btn-danger">刪除</button>--}}
                            {{--</form>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-lg-2"></div>--}}
{{--</div>--}}
</font>
<!-- /.row -->
@endsection
