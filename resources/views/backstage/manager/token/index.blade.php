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
            <font color="#000000" face="微軟正黑體"><i class="fa fa-key"></i> Token管理</font>
        </h1>
    </div>
</div>

<!-- /.row -->
{{--<div class="row" style="margin-bottom: 20px; text-align:right">--}}
{{--    <div class="col-lg-12">--}}
{{--        <a href="{{ route('backstage.manager.post.create') }}" class="btn btn-success"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-plus-circle"></i> 新增公告</font></a>--}}
{{--    </div>--}}
{{--</div>--}}
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
                        <th width="500" style="text-align: center">Token</th>
                        <th width="80" style="text-align: center">修改</th>
                    </tr>
                </thead>
                <tbody style="border:3px #9BA2AB solid;">
                @foreach($restaurant as $rs)
                    <tr>
                        <td>{{$rs->token}}</td>
                        <td>
                            <a href="{{ route('backstage.manager.token.edit',$rs->id) }}" class="btn btn-info" style="text-decoration:none;"><i class="fa fa-edit"></i> 修改</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</font>
<!-- /.row -->
@endsection
