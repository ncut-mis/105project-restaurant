<!DOCTYPE html>
<html>
<head>


    <script src="{{ asset('js/instascan.min.js') }}"></script>
</head>
<body>


<!-- 詢問是否允許開啟相機後 -->

<video id="preview"></video>


<!-- 開啟一個新的掃描，宣告變數scanner，在標籤id為preview的地方開啟相機預覽。 -->

<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {

        //開始掃描，掃到QR後的解碼內容會放在content

        alert('將在確認之後跳往' + content); location.href = content;

    });

    Instascan.Camera.getCameras().then(function (cameras) {

        //取得設備的相機數目

        if (cameras.length > 0) {

            //若設備相機數目大於0 則先開啟第0個相機

            scanner.start(cameras[0]);
        } else {

            //若設備沒有相機數量則顯示"沒有找到相機";

            console.error('沒有找到相機.');
        }
    }).catch(function (e) {
        console.error(e);
    });


</script>

</body>
</html>
