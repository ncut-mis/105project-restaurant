@extends('backstage.chef.layouts.master')
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

    <font color="#000000" face="微軟正黑體">
    <div class="row" style="margin-bottom: 1px; text-align:right">
        <div class="col-lg-12" style="text-align:center" >
            餐點類型：1代表主餐、2代表開胃品、3代表沙拉、4代表前菜、5代表湯品、6代表甜品、7代表飲料。
            <p></p>
            下列餐點均依照上述順序排列。
        </div>
<<<<<<< HEAD
        <a href="{{ route('backstage.chef.meal.create') }}" class="btn btn-success"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-plus-circle"> 新增餐點</i></font></a>
=======
    <div>
            <a href="{{ route('backstage.chef.meal.create') }}" class="btn btn-success"><font color="#ffffff" face="微軟正黑體">新增餐點</font></a>
            <a href="{{ route('noti') }}" class="btn btn-info"><font color="#ffffff" face="微軟正黑體">發送通知(Laravel-FCM版)</font></a>
        </div>
>>>>>>> b8f165878039a9ddcd1a0a17ace32b71887ee53e
    </div>
    </font>
    <!-- /.row -->
    <font color="#000000" face="微軟正黑體" style="text-align: center">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="80" style="text-align: center">餐點類型</th>
                            <th width="180" style="text-align: center">名稱</th>
                            <th width="100" style="text-align: center">照片</th>
                            <th width="450" style="text-align: center">原料說明</th>
                            <th width="80" style="text-align: center">價錢</th>
                            <th width="100" style="text-align: center">修改</th>
                            <th width="100" style="text-align: center">刪除</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($meal as $ml)
                            <tr>
                                <td>{{$ml->category_id}}</td>
                                <td>{{$ml->name}}</td>
                                <td><img src="{{url('img/meal/'. $ml->photo)}}" width=80%></td>
                                <td>{{$ml->ingredients}}</td>
                                <td>{{$ml->price}}</td>
                                <td><a href="{{ route('backstage.chef.meal.edit',$ml->id) }}" class="btn btn-info" style="text-decoration:none;"><i class="fa fa-edit"> 修改</i></a></td>
                                <td>
                                    <form action="{{ route('backstage.chef.meal.destroy', $ml->id) }}" method="POST" onsubmit="return ConfirmDelete()">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button  class="btn btn-danger"><i class="fa fa-trash"> 刪除</i></button>
                                    </form>
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
            var x = confirm("確定要刪除該餐點嗎?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

    <!-- /.row -->
@endsection
