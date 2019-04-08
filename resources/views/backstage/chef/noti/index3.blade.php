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
<script>
    const messaging = firebase.messaging();

    messaging.requestPermission().then(res=>
        {
            return messaging.getToken();
        }, err => {
        // 若拒絕通知
        console.log(err);
    })
    .then(token => {
        // 成功取得 token
        console.log(token);
        document.write(token);
    });

</script>
<p></p>
<div>

    <button class=" col-md-12">123</button>
</div>
<script>
    messaging.onMessage(payload => {
        console.log('onMessage: ', payload);
        var notifyMsg = payload.notification;
        var notification = new Notification(notifyMsg.title, {
            body: notifyMsg.body,
            icon: notifyMsg.icon
        });
    });

    var key = 'AAAAWvSSlZU:APA91bEdu07BlcRY0i-y2av_bPdNmP5e218LTZFotxsiMUxvS9i98gKBDmtTV5Zh19Z6rOM8xw-uHshM9B3lXYQ42y_kbHiZAkFqVfX7TxkWmX_2_r8Mgmbcik6hmjNhJVOfMhlJCKCo';
    var to = 'dGtUbr_cro0:APA91bEoMfJzpTZL9xFZj1rQRsunnUYx0QCK3A0DExumVK7x8mWa0WIsBy_UndMu4AYUX9qOsZxtRfKraVNXIROGoC9RDEg-S1IkJ9Oe3BbzxDCElSb0QMXYVixw57Iz-cngCOBptDqv';
    var notification = {
        'title':'receive_my title',
        'body': 'Hello world!',
        'click_action': 'http://localhost:8000'
    };
    fetch('https://fcm.googleapis.com/fcm/send', {
        'method': 'POST',
        'headers': {
            'Authorization': 'key=' + key,
            'Content-Type': 'application/json'
        },
        'body': JSON.stringify({
            'notification': notification,
            'to': to
        })
    }).then(function(response) {
        console.log(response);
    }).catch(function(error) {
        console.error(error);
    });
</script>

</body>
