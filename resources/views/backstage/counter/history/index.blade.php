@extends('backstage.counter.layouts.master')
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
    <style>
        .style-four {
            height: 12px;
            border: 0;
            box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
        }
    </style>
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
    @php($as[]="")
    @php($account=0)
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">歷史用餐紀錄_History</font>
            </h1>
        </div>
    </div>

    <table class="table table-bordered table-hover">

        <tbody>
        <tr>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">顧客編號</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">日期</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">入座時間</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">人數</font></h5>
            </td>
            <td bgcolor="gray" width="60px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">餐點</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">總金額</font></h5>
            </td>
        </tr>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td style="text-align: center">
                    {{$order->id}}
                </td>
                <td style="text-align: center">{{date('Y/m/d',strtotime($order->StartTime))}}</td>
                <td style="text-align: center">{{date('H:i',strtotime($order->StartTime))}}</td>
                <td style="text-align: center">{{$order->number}}人</td>
                <td style="text-align: center">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter{{$order->id}}">
                        詳細餐點
                    </button>
                </td>
                <td style="text-align: center">
                    {{$order->total}}元
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Button trigger modal -->

@php($money=0)

    <!-- Modal -->
    @foreach($orders as $order)
        <div class="modal fade" id="exampleModalCenter{{$order->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                            <h3><font face="微軟正黑體"><b>餐點內容</b></font></h3>
                    </div>
                    <div class="modal-body">
                            <div class="row" style="padding-top:10px;">
                                @foreach($items as $it)
                                    @if($it->order_id==$order->id)
                                        @php($popo=count([$it->name]))
                                        <div class="col-md-3"></div>
                                        <div class="col-md-4">
                                            {{$it->name}}
                                            <br>
                                        </div>
                                        <div class="col-md-1">
                                            x{{$it->quantity}}
                                            <br>
                                        </div>
                                        <div class="col-md-1">
                                            {{$it->price}}
                                            <br>
                                        </div>
                                        <div class="col-md-3"></div>
                                        <br>
                                    @endif
                                @endforeach

                            </div>
                        <div class="row" style="padding-top:10px">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8 style-four">
                                <p align=right><font face="微軟正黑體"><b>金額總計：{{$order->total}}元</b></font></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">確認</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    </body>
@endsection
