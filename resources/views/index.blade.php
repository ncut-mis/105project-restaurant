@extends('layouts.back')
<head>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyCTnmGUSXbyvJKbrmIcXtXMze3mecGKF-A",
            authDomain: "project-restaurants-ncut.firebaseapp.com",
            databaseURL: "https://project-restaurants-ncut.firebaseio.com",
            projectId: "project-restaurants-ncut",
            storageBucket: "project-restaurants-ncut.appspot.com",
            messagingSenderId: "390650303893"
        };
        firebase.initializeApp(config);
    </script>
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

        .pic2 {
            position:relative;
            width: 180px;
            height: 180px;
            overflow: hidden;
            border-radius:50%;
        }
        .pic2 img {
            width: auto;
            height: 100%;

        }

        /*.body {*/
        /*!* background-image: url("https://unsplash.com/photos/gFyy2Po7T-k") ; *!*/
        /*background-color: #FF3333;*/
        /*}*/
    </style>
</head>
<body>
<script>
    const messaging = firebase.messaging();
    if('serviceWorker' in navigator) {
        console.log('支援sw');
        navigator.serviceWorker.register("firebase-messaging-sw.js")
            .then(registration => {
                messaging.useServiceWorker(registration);
                messaging.requestPermission()
                    .then(() => {
                        // getToken();
                        console.log('允許通知')
                    })
                    .catch(() => {
                        console.log('unable to get permission to notify');
                    });
                console.log('成功', registration);
            }).catch(err => {
            console.log('fail', err);
        })
    } else {
        console.log('不支援sw');
    }
</script>
</body>
@section('content')

            <div class="col-md-12">
                <div class="card" style="border-style:none;background-color:transparent;padding-top: 200px">
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($restaurants as $rs)
                    <div class="col-md-4">
                        <div class="card" style="border-style: none;background-color:transparent;">
                            <div class="card-body" style="padding-top:1px;">

                                <form method="POST" action="{{route('restaurant{id}.staffs',$rs->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('get') }}
                                    <div class="row justify-content-center">
                                        @php
                                            $img = getimagesize('img/logo/'. $rs->logo);
                                        @endphp

                                        @if($img[0]<$img[1])
                                            <div class="pic">
                                                <img  src="{{url('img/logo/'. $rs->logo)}}"  class="center-block " alt="boy">
                                            </div>
                                        @else
                                            <div class="pic2">
                                                <img  src="{{url('img/logo/'. $rs->logo)}}"  class="center-block " alt="boy">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row justify-content-center">
                                        <label class=" col-md-12" style="text-align: center;font-family: 微軟正黑體 ;font-size: 38px;color:#FFFFFF;padding: 1px 1px 1px 1px;margin-top: 5px;background-color: transparent;border-style: none;">
                                            {{$rs->name }}
                                        </label>
                                    </div>
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary col-md-11 " style="font-family: 微軟正黑體; font-weight: bold;">
                                            {{ __('選擇') }}
                                        </button>
                                        {{--<a href="{{route('restaurant{id}.staffs',$rs->id)}}"><h1><font color="#ffffff" size="5" face="微軟正黑體"><b>選擇</b></font></h1></a>--}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

@endsection
