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

@extends('backstage.manager.layouts.master')
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體"><i class="fa fa-edit"></i> 修改Token </font>
        </h1>
    </div>
</div>
<p id="token"></p>
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
            document.getElementById("token").innerHTML = "目前網站token為：<br>" +token+"<br>為使網站所有功能得以正常運作，請將上述代碼複製並貼上於下方框框中，謝謝。";
        });
</script>
<!-- /.row -->
@include('backstage.manager.layouts.partials.validation')
<!-- /.row -->
<font color="#000000" face="微軟正黑體" style="text-align: center">
<div class="row">
    <form action="/backstage/token/{{$restaurant->id}}" method="POST" role="form">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" style="border:3px #9BA2AB solid;">
                    <thead style="border:2px #9BA2AB solid;">
                        <tr style="background-color: lightgrey;">
                            <th width="1000" style="text-align: center">Token</th>
                            <th width="50" style="text-align: center">送出</th>
                        </tr>
                    </thead>
                    <tbody style="border:3px #9BA2AB solid;">
                        <tr>
                            <td>
                                <input name="token" class="form-control" placeholder="請輸入名稱" value="{{$restaurant->token}}" required>
                            </td>
                            <td>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">更新</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
</font>



<!-- /.row -->
@endsection
