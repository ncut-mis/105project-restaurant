@extends('backstage.layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">餐點管理 <small>所有餐點列表</small></font>
            </h1>
        </div>
    </div>
    <!-- /.row -->


    <div class="row" style="margin-bottom: 1px; text-align:right">
        <div class="row" style="text-align:center" >
            餐點類型：1代表主餐、2代表開胃品、3代表沙拉、4代表前菜、5代表湯品、6代表甜品、7代表飲料。
        </div>
    <div>
            <a href="{{ route('backstage.chef.meal.create') }}" class="btn btn-success"><font color="#ffffff" face="微軟正黑體">新增餐點</font></a>
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
                            <th width="100" style="text-align: center">名稱</th>
                            <th width="100" style="text-align: center">餐點類型</th>
                            <th width="80" style="text-align: center">照片</th>
                            <th width="900" style="text-align: center">原料說明</th>
                            <th width="120" style="text-align: center">價錢</th>
                            <th width="100" style="text-align: center">修改</th>
                            <th width="100" style="text-align: center">刪除</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($meal as $ml)
                            <tr>
                                {{--<td>{{$sf->id}}</td>--}}
                                <td>{{$ml->name}}</td>
                                <td>{{$ml->meal_types_id}}</td>
                                <td>{{$ml->photo}}</td>
                                <td>{{$ml->ingredients}}</td>
                                <td>{{$ml->price}}</td>
                                <td><a href="{{ route('backstage.chef.meal.edit',$ml->id) }}" class="btn btn-info" style="text-decoration:none;">修改</a></td>
                                <td><form action="{{ route('backstage.chef.meal.destroy', $ml->id) }}" method="POST">
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
