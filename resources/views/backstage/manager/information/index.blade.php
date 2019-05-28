@extends('backstage.manager.layouts.master')
@section('content')

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體"><i class="fa fa-info-circle"></i> 基本資料</font>
        </h1>
    </div>
</div>

<!-- /.row -->
<div class="row" style="margin-bottom: 20px; text-align:right">
    <div class="col-lg-12">
        <a href="{{ route('backstage.manager.information.edit',Auth::user()->restaurant_id)}}" class="btn btn-info"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-edit"></i> 修改餐廳基本資料</font></a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@elseif(session('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif

<div class="col-md-12">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" style="border:3px #9BA2AB solid;">
                <thead style="border:2px #9BA2AB solid;">
                <tr style="background-color: lightgrey;">
                    <th width="50" style="text-align: center"><font color="#000000" face="微軟正黑體" size="5"><b>餐廳基本資料</b></font></th>
                </tr>
                </thead>
                <tbody>
                @foreach($restaurants as $res)
                    <tr>
                        <td><font color="#000000" face="微軟正黑體" size="5"><b>{{ __('　餐廳名稱：') }}</b></font><font color="#000000" face="微軟正黑體" size="4">{{$res->name}}</font></td>
                    </tr>
                    <tr>
                        <td><font color="#000000" face="微軟正黑體" size="5"><b>{{ __('　ＬＯＧＯ：') }}</b></font><img src="{{url('img/logo/'. $res->logo)}}" width=50%></td>
                    </tr>
                    <tr>
                        <td><font color="#000000" face="微軟正黑體" size="5"><b>{{ __('　電　　話：') }}</b></font><font color="#000000" face="微軟正黑體" size="4">{{$res->phone}}</font></td>
                    </tr>
                    <tr>
                        <td><font color="#000000" face="微軟正黑體" size="5"><b>{{ __('　地　　址：') }}</b></font><font color="#000000" face="微軟正黑體" size="4">{{$res->address}}</font></td>
                    </tr>
                    <tr>
                        <td><font color="#000000" face="微軟正黑體" size="5"><b>{{ __('　營業時間：') }}</b></font><font color="#000000" face="微軟正黑體" size="4">{{$res->OpenHour}}</font>~<font color="#000000" face="微軟正黑體" size="4">{{$res->EndHour}}</font></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<!-- /.row -->
@endsection