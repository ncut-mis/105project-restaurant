@extends('layouts.back')
<head>
    <style>
        .pic {
            position:relative;
            width: 180px;
            height: 180px;
            overflow: hidden;
            border-radius:50%;
        }
        .pic img {
            width: 100%;
            height: auto;

        }

        /*.body {*/
        /*!* background-image: url("https://unsplash.com/photos/gFyy2Po7T-k") ; *!*/
        /*background-color: #FF3333;*/
        /*}*/
    </style>
</head>

@section('content')
    @foreach($restaurants as $rs)
            <div class="col-md-12">
                <div class="card" style="border-style:none;background-color:transparent;padding-top: 200px">
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card" style="border-style: none;background-color:transparent;">
                            <div class="card-body" style="padding-top:1px;">
                                    <div class="row justify-content-center">
                                        <div class="pic">
                                            <img  src="{{$rs->logo}}"  class="center-block " alt="boy">
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <label class=" col-md-8" style="text-align: center;font-family: 微軟正黑體 ;font-size: 38px;color:#FFFFFF;padding: 1px 1px 1px 1px;margin-top: 5px;background-color: transparent;border-style: none;">
                                            {{$rs->name }}
                                        </label>
                                    </div>
                                    <div class="row justify-content-center">
                                        <a href="{{route('restaurant{id}.staffs',$rs->id)}}"><h1><font color="#ffffff" size="5" face="微軟正黑體"><b>選擇</b></font></h1></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
@endsection
