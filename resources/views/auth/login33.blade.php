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
                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="row justify-content-center">
                                    <div class="pic">
                                        <img  src="/img/001.jpg"  class="center-block " alt="boy">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <label class=" col-md-8" style="text-align: center; font-size: 38px;color:#FFFFFF;padding: 1px 1px 1px 1px;margin-top: 5px;background-color: transparent;border-style: none;">
                                        {{ __($user->name) }}
                                    </label>
                                </div>
                                <div>
                                    <input id="email" type="hidden" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary col-md-11 ">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


             </div>
        </div>

@endsection
