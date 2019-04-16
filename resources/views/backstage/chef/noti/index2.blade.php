<script>/*以JavaScript做網頁推播*/
    function cc()
    {
        var notifyConfig = //宣告通知相關內容
            {
                body: '\\ ^o^ /', // 設定內容
                icon: '/images/favicon.ico' // 設定 icon
            };
        if (Notification.permission === 'default' || Notification.permission === 'undefined')
        //9~17行，請求使用者同意顯示瀏覽器通知功能
        {
            Notification.requestPermission(function (permission) {
                if (permission === 'granted')// 使用者同意授權
                {
                }
            });
        }
            var notification = new Notification('有一份餐點完成囉!', notifyConfig); // 建立通知&通知的title
           /* 點擊通知事件，待開發
           notification.onclick = function (e)
            {
                e.preventDefault(); // prevent the browser from focusing the Notification's tab
                window.open('http://project105-restaurant.herokuapp.com/backstage/counter/index'); // 打開特定網頁
            }
            */
    }
</script>
<button id="abc" onclick="cc()">發送通知</button>

