@extends('backstage.chef.layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">出餐管理 <small>所有明細列表</small></font>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <font color="#000000" face="微軟正黑體" style="text-align: center">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="50" style="text-align: center">明細編號</th>
                            <th width="50" style="text-align: center">餐點名稱</th>
                            <th width="50" style="text-align: center">數量</th>
                            <th width="50" style="text-align: center">更改狀態</th>
                            <th width="50" style="text-align: center">發送通知</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($item as $it)
                            <tr>
                                <td>{{$it->id}}</td>
                                <td>{{$it->name}}</td>
                                <td>{{$it->quantity}}</td>
                                <td>
                                    <form action="/backstage/chef/rcveod/{{$it->order_id}}/{{$it->id}}" method="POST" role="form">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        @if($it->status==0)
                                            <input name="status" type="hidden" class="form-control" placeholder="請輸入狀態" value="1" required>
                                            <button type="submit" class="btn btn-success">完成</button>
                                        @else
                                            已完成
                                        @endif
                                    </form>
                                </td>
                                <td>
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
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </font>
    <!-- /.row -->
@endsection
