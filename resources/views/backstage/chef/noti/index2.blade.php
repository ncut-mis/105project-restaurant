<head>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase.js"></script>
    <script>
        $(document).ready(function () {
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
            //收到訊息後的處理
            messaging.onMessage(function (payload) {
                //Log
                $('#log').prepend("Message received :" + JSON.stringify(payload) + "<br><br>");

                //如果可以顯示通知就做顯示通知
                if (Notification.permission === 'granted') {
                    ShowNotification(payload.data.title, payload.data.body);
                    //三秒後自動關閉
                    setTimeout(notification.close.bind(notification), 3000);
                }
            });
        });
    </script>
</head>
<body>
<script>
    function RegistUserTokenToSelfServer(user_token, successFunc, errorFunc) {
        var $res = '';
        $.ajax({
            type: "POST",
            url: "receive_user_token.aspx",
            contentType: 'application/x-www-form-urlencoded',
            async: true,
            cache: false,
            dataType: 'text',
            data: { user_token: user_token },
            success: function (data) {
                if (data.hasOwnProperty("d")) {
                    $res = data.d;
                    if (successFunc != null)
                        successFunc(data.d);
                }
                else {
                    $res = data;
                    if (successFunc != null)
                        successFunc(data);
                }
            },
            error: function (e) {
                if (errorFunc != null)
                    errorFunc(e);
            }


        });
        return $res;
    }


    $('#btnStarGetTokenAndReceivePush').click(function () {

        messaging.getToken()
            .then(function (currentToken) {
                $('#log').append("TOKEN: " + currentToken + "<br><br>")
                if (currentToken) {
                    RegistUserTokenToSelfServer(currentToken, function (result) {
                        $('#log').prepend("送回給自己 Server 的結果 :" + result + "<br><br>")
                    });
                } else {
                    $('#log').prepend('註冊失敗請檢查相關設定.');
                }
            })
            .catch(function (err) {

                $('#log').prepend("跟 Server 註冊失敗 原因:" + err + "<br>");
            });

    });

</script>
<script>


</script>

</body>
