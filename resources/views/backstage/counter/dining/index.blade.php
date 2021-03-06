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

@extends('backstage.counter.layouts.master')
@section('content')
    <!-- Page Heading -->
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
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">用餐中_Dining</font>
            </h1>
        </div>
    </div>
    <table class="table table-bordered table-hover">

        <tbody>
        <tr>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">order編號</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">桌號</font></h5>
            </td>
            <td bgcolor="gray" width="60px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">櫃台確認出餐完畢</font></h5>
            </td>
            <td bgcolor="gray" width="60px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">餐點狀態</font></h5>
            </td>
            <td bgcolor="gray" width="90px" style="text-align: center">
                <h5><font face="微軟正黑體" color="white">結帳</font></h5>
            </td>
        </tr>
        <tbody>
        @foreach($orders as $order)

            <tr>
                <td style="text-align: center">{{$order->id}}</td>
                <td style="text-align: center">
                    @php($d=0)
                    @foreach($numbers as $number)
                        @if($number->order_id == $order->id)
                            @foreach($tables as $table)
                                @if($table->id == $number->table_id)
                                    第{{$table->number}}桌
                                    @php($d++)
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </td>
                <td style="text-align: center">

                    <form action="{{route('counter.check-kitchen',$order->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <input name="status" type="hidden" value="用餐中">
                        @if($order->status=='出餐中')
                            <button type="submit" class="btn btn-success">更新</button>
                        @else
                            已全部完成
                        @endif
                    </form>

                </td>
                <td style="text-align: center">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter{{$order->id}}">
                        詳細餐點狀態
                    </button>
                </td>
                <td style="text-align: center">

                <a href="{{ route('counter.checkout',$order->id) }}" class="btn btn-info" style="text-decoration:none;">
                    <i class="fa fa-edit">結帳</i>
                </a></td>


                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <!-- Button trigger modal -->


    <!-- Modal -->
    @foreach($orders as $order)
        <div class="modal fade" id="exampleModalCenter{{$order->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3><font face="微軟正黑體"><b>餐點狀態</b></font></h3>
                    </div>
                    <div class="modal-body">
                        @foreach($categories as $category)
                            <div class="row" style="padding-top:10px">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-2">
                                    @php($f=0)
                                    @foreach($items as $item)
                                        @if($item->order_id == $order->id)
                                            @if($category->id == $item->category_id)
                                                @php($f++)
                                            @endif
                                        @endif
                                    @endforeach

                                    @if($f!=0)
                                        {{$category->name}}
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @foreach($items as $item)
                                        @if($item->order_id == $order->id)
                                            @if($category->id == $item->category_id)
                                                {{$item->name}}
                                                <br>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-1">
                                    @foreach($items as $item)
                                        @if($item->order_id == $order->id)
                                            @if($category->id == $item->category_id)
                                                x{{$item->quantity}}
                                                <br>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-1">
                                    @foreach($items as $item)
                                        @if($item->order_id == $order->id)
                                            @if($category->id == $item->category_id)
                                                {{$item->quantity*$item->price}}
                                                <br>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-2">
                                    @foreach($items as $item)
                                        @if($item->order_id == $order->id)
                                            @if($category->id == $item->category_id)
                                                @if($item->status == 2)
                                                    <span style="color:WHITE; background-color:#FF0000">->製作中</span>
                                                {{--@elseif($item->status == 1)--}}
                                                    {{--<span style="color:WHITE; background-color:#FF0000">->製作中</span>--}}
                                                    @else
                                                    ->已上菜
                                                @endif
                                                <br>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

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
