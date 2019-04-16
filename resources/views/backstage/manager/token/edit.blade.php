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
<body>
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
            document.getElementById("token").innerHTML = "目前網站token為：<br>" +token;
        });
</script>

<p></p>

<div>

    <button class=" col-md-12">123</button>
</div>
</body>

<form action="/backstage/token/{{$restaurant->id}}" method="POST" role="form">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {{--名稱--}}
                    <div class="form-group row">
                        <label for="token" class="col-md-4 col-form-label" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('更新token，將上面顯示的token複製貼上於下方') }}</font></label>
                        <div class="col-md-8">
                            <input name="token" class="form-control" placeholder="請輸入名稱" value="{{$restaurant->token}}" required>
                        </div>
                    </div>
                    {{--更新--}}
                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4" style="text-align:center">
                            <div class="text-right">
                                <button type="submit" class="btn btn-success">更新</button>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</form>
