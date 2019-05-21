@extends('backstage.counter.layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">確認餐點_Check</font>
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
                            <th width="50" style="text-align: center">狀態</th>
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
                                    <form action="/backstage/rcveod/{{$it->order_id}}/{{$it->id}}" method="POST" role="form">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        @if($it->status==0)
                                            <input name="status" type="hidden" class="form-control" placeholder="請輸入狀態" value="1" required>
                                            <button type="submit" class="btn btn-success">尚未送出餐點至廚房</button>
                                        @else
                                            已送至廚房
                                        @endif
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('counter.checking.kitchen',[$it->order_id,$it->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <input name="status" type="hidden" class="form-control" placeholder="請輸入狀態" value="1" required>
                                        <div>
                                            <button type="submit" class="btn btn-primary col-md-11 ">
                                                發送
                                            </button>
                                        </div>
                                    </form>
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
