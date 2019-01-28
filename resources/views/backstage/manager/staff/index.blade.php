@extends('backstage.layouts.master')
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體">人員管理 <small>所有人員列表</small></font>
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row" style="margin-bottom: 20px; text-align:right">
    <div class="col-lg-12">
        <a href="{{ route('backstage.manager.staff.create') }}" class="btn btn-success"><font color="#ffffff" face="微軟正黑體">新增人員</font></a>
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
                        <th width="50" style="text-align: center">編號</th>
                        <th width="80" style="text-align: center">姓名</th>
                        <th width="80" style="text-align: center">職稱</th>
                        <th width="120" style="text-align: center">信箱</th>
                        <th width="120" style="text-align: center">電話</th>
                        <th width="200" style="text-align: center">地址</th>
                        <th width="100" style="text-align: center">修改</th>
                        <th width="100" style="text-align: center">刪除</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($staff as $sf)
                    <tr>
                        <td>{{$sf->id}}</td>
                        <td>{{$sf->name}}</td>
                        <td>{{$sf->position}}</td>
                        <td>{{$sf->email}}</td>
                        <td>{{$sf->phone}}</td>
                        <td>{{$sf->address}}</td>
                        <td><a href="{{ route('backstage.manager.staff.edit',$sf->id) }}" class="btn btn-info" style="text-decoration:none;">修改</a></td>
                        <td><form action="{{ route('backstage.manager.staff.destroy', $sf->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button  class="btn btn-danger">刪除</button>
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
