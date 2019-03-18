<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>餐廳 | 管理後台</title>


    <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
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
        const messaging = firebase.messaging();
        messaging.requestPermission()
            .then(res => {
                // 若允許通知 -> 向 firebase 拿 token
                return messaging.getToken();
            }, err => {
                // 若拒絕通知
                console.log(err);
            })
            .then(token => {
                // 成功取得 token
                postToken(token); // 打給後端 api
                console.log(token);
            })

        // 接收到通知時
        messaging.onMessage(payload => {
            console.log('onMessage: ', payload);
            var notifyMsg = payload.notification;
            var notification = new Notification(notifyMsg.title, {
                body: notifyMsg.body,
                icon: notifyMsg.icon
            });
            notification.onclick = function (e) { // 綁定點擊事件
                e.preventDefault(); // prevent the browser from focusing the Notification's tab
                window.open(notifyMsg.click_action);
            }
        })
    </script>

    <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase-messaging.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('css/plugins/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <![endif]-->
</head>

<body>


    <div id="wrapper">

        @include('backstage.chef.layouts.partials.sidebar')

        <div id="page-wrapper">

            <div class="container-fluid">

                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('js/plugins/morris/morris-data.js') }}"></script>
</body>

</html>
