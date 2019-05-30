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
</head>
@extends('backstage.counter.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">通知維護管理 <small></small></font>
            </h1>
        </div>
    </div>
    如果櫃台無法正常顯示通知，請點擊下方更新紐，系統將自動調整。
    @foreach($token as $tk)
        <form action="{{route('counter.notify.update',$tk->id)}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <p id="token" hidden ></p>
            <script>

                const messaging = firebase.messaging();
                messaging.requestPermission().then(res=>
                    {
                        return messaging.getToken();
                    }
                    , err => {
                        // 若拒絕通知
                        console.log(err);
                    })
                    .then(token => {
                        // 成功取得 token
                        console.log(token);
                        document.getElementById("token").innerHTML = "目前個人驗證碼為：<br>" +token;
                        document.getElementById("abc").value=token;
                    });
            </script>
            <div>
                <input name="token" class="form-control" placeholder="請輸入下方顯示之個人驗證碼" id="abc" type="hidden">
            </div>

            <div class="col-md-12" style="text-align:center">
                <div class="text-center">
                    <button type="submit" class="btn btn-success"><span class="mbri-update"></span><font face="微軟正黑體">更新</font></button>
                </div>
            </div>

        </form>

    @endforeach

@endsection