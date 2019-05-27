@extends('backstage.manager.layouts.master')
@section('content')

    <style>
        .table {border: 1px solid black;}
        .table tr:nth-child(even) {background: #EDEDED}
        .table tr:nth-child(odd) {background: #FFFFFF}
    </style>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體"><i class="fa fa-gift"></i> 優惠券管理 <small>優惠券列表</small></font>
        </h1>
    </div>
</div>

<!-- /.row -->
<div class="row" style="margin-bottom: 20px; text-align:right">
    <div class="col-lg-12">
        <a href="{{ route('backstage.manager.coupon.create') }}" class="btn btn-success"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-plus-circle"></i> 新增優惠券</font></a>
    </div>
</div>

<!-- /.row -->
<font color="#000000" face="微軟正黑體" style="text-align: center">
<div class="row">
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" style="border:3px #9BA2AB solid;">
                <thead style="border:2px #9BA2AB solid;">
                    <tr style="background-color: lightgrey;">
                        <th width="100" style="text-align: center">優惠券名稱</th>
                        <th width="150" style="text-align: center">內容</th>
                        <th width="150" style="text-align: center">圖片</th>
                        <th width="85" style="text-align: center">折扣金額</th>
                        <th width="85" style="text-align: center">最低消費<br>金額</th>
                        <th width="150" style="text-align: center">開始時間</th>
                        <th width="150" style="text-align: center">結束時間</th>
                        <th width="100" style="text-align: center">發送優惠券</th>
                        <th width="80" style="text-align: center">修改</th>
                        <th width="80" style="text-align: center">刪除</th>
                    </tr>
                </thead>
                <tbody style="border:3px #9BA2AB solid;">
                @foreach($coupons as $coupon)
                    <tr>
                        <td>{{$coupon->title}}</td>
                        <td>{{$coupon->content}}</td>
                        <td><img src="{{url('img/coupon/'. $coupon->photo)}}" width=50%></td>
                        <td>{{$coupon->discount}}</td>
                        <td>{{$coupon->lowestprice}}</td>
                        <td>{{$coupon->StartTime}}</td>
                        <td>{{$coupon->EndTime}}</td>
                        <td>
                            @if($coupon->status ==0)
                                <form action="/backstage/manager/coupon/{{$coupon->id}}" method="POST">
                                    <a href ="{{ route('backstage.manager.coupon.noti',$coupon->id) }}" class="btn btn-primary " type="submit" role="button"><i class="fa fa-paper-plane"></i> {{($coupon->status)?'已發送':'發送'}}</a>
                                    {{ csrf_field() }}
                                </form>
                            @elseif($coupon->status ==1)
                                <button class="btn btn-primary" disabled>
                                    <strong><i class="fa fa-paper-plane"></i>已發送</strong>
                                </button>
                            @endif
                        </td>
                        <td>
                            @if($coupon->status==1)
                                <button class="btn btn-info" disabled><i class="fa fa-edit"></i> 修改</button>
                            @else
                                <button class="btn btn-info"><a href="{{route('backstage.manager.coupon.edit',$coupon->id)}}" style="text-decoration:none;color: white"><i class="fa fa-edit"></i> 修改</a></button>
                            @endif
                        </td>
                        <td>
                            @if($coupon->status==1)
                                <form action="{{ route('backstage.manager.coupon.destroy', $coupon->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button  class="btn btn-danger" disabled><i class="fa fa-trash"></i> 刪除</button>
                                </form>
                            @else
                                <form action="{{ route('backstage.manager.coupon.destroy', $coupon->id) }}" method="POST" onsubmit="return ConfirmDelete()">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button  class="btn btn-danger"><i class="fa fa-trash"></i> 刪除</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</font>

    <script>
        function ConfirmDelete()
        {
            var x = confirm("確定要刪除該優惠券嗎?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
<!-- /.row -->
@endsection
