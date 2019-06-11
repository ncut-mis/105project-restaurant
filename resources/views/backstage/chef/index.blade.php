@extends('backstage.chef.layouts.master')
<head>
    <script src="https://www.gstatic.com/firebasejs/6.1.1/firebase.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyCTnmGUSXbyvJKbrmIcXtXMze3mecGKF-A",
            authDomain: "project-restaurants-ncut.firebaseapp.com",
            databaseURL: "https://project-restaurants-ncut.firebaseio.com",
            projectId: "project-restaurants-ncut",
            storageBucket: "project-restaurants-ncut.appspot.com",
            messagingSenderId: "390650303893",
            appId: "1:390650303893:web:2ea9767ea995ff31"
        };
        firebase.initializeApp(config);
    </script>
</head>
</head>
@section('content')
    <body>

    <script>
        const messaging = firebase.messaging();
        messaging.onMessage(payload => {
            console.log('onMessage: ', payload);
            var notifyMsg = payload.notification;
            var notification = new Notification(notifyMsg.title, {
                body: notifyMsg.body,
                icon: notifyMsg.icon
            });
        });
    </script>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體">廚房管理 <small></small></font>
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
<!-- /.row -->
    </body>
@endsection
