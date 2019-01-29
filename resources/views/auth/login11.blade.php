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
        <div class="col-md-12">
            <div class="card" style="border-style:none;background-color:transparent;padding-top: 200px">
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-4">
                    <div class="card" style="border-style: none;background-color:transparent;">
                        <div class="card-body" style="padding-top:1px;">
                            @foreach($restaurants as $restaurant)
                                <form method="POST" action=" {{ route('restaurant.staffs.chose',$restaurant->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('get') }}
                                    <div class="row justify-content-center">
                                        <div class="pic">
                                            <img src="img/001.jpg"  class="center-block " alt="boy">
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <label class=" col-md-8" style="text-align: center;font-family: 微軟正黑體 ;font-size: 38px;color:#FFFFFF;padding: 1px 1px 1px 1px;margin-top: 5px;background-color: transparent;border-style: none;">
                                            {{ __('餐廳經理') }}
                                        </label>
                                    </div>
                                    <input class="form-control col-md-6 " type="hidden" name="restaurant_id" value="{{ $restaurant->id }}" readonly >
                                    <input class="form-control col-md-6 " type="hidden" name="position" value="{{ "經理" }}" readonly >
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary col-md-11" >
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="border-style: none;background-color:transparent;">
                        <div class="card-body" style="padding-top:1px;">
                            @foreach($restaurants as $restaurant)
                            <form method="POST" action="{{ route('restaurant.staffs.chose',$restaurant->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('get') }}
                                <div class="row justify-content-center">
                                    <div class="pic">
                                        <img  src="img/005.jpg"  class="center-block " alt="boy">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <label class=" col-md-8" style="text-align: center;font-family: 微軟正黑體 ;font-size: 38px;color:#FFFFFF;padding: 1px 1px 1px 1px;margin-top: 5px;background-color: transparent;border-style: none;">
                                        {{ __('櫃台人員') }}
                                    </label>
                                </div>
                                <input class="form-control col-md-6 " type="hidden" name="restaurant_id" value="{{ $restaurant->id }}" readonly >
                                <input class="form-control col-md-6 " type="hidden" name="position" value="{{ "櫃台" }}" readonly >
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary col-md-11">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                                @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="border-style: none;background-color:transparent;">
                        <div class="card-body" style="padding-top:1px;">
                            @foreach($restaurants as $restaurant)
                            <form method="POST" action="{{ route('restaurant.staffs.chose',$restaurant->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('get') }}
                                <div class="row justify-content-center">
                                    <div class="pic">
                                        <img  src="img/007.jpg"  class="center-block " alt="boy">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <label class=" col-md-8" style="text-align: center;font-family: 微軟正黑體 ;font-size: 38px;color:#FFFFFF;padding: 1px 1px 1px 1px;margin-top: 5px;background-color: transparent;border-style: none;">
                                        {{ __('主廚') }}
                                    </label>
                                </div>
                                <input class="form-control col-md-6 " type="hidden" name="restaurant_id" value="{{ $restaurant->id }}" readonly >
                                <input class="form-control col-md-6 " type="hidden" name="position" value="{{ "主廚" }}" readonly >
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary col-md-11">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                                @endforeach
                        </div>
                    </div>
                </div>
             </div>
        </div>

@endsection
