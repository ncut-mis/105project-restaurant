@extends('backstage.chef.layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">出餐管理 <small>所有點單列表</small></font>
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
                            {{--<th width="50" style="text-align: center">編號</th>--}}
                            <th width="50" style="text-align: center">點單編號</th>
                            <th width="50" style="text-align: center">顧客編號</th>
                            <th width="50" style="text-align: center">桌子編號</th>
                            <th width="100" style="text-align: center">點單成立時間</th>
                            <th width="50" style="text-align: center">進入明細</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $od)
                            <tr>
                                {{--<td>{{$sf->id}}</td>--}}
                                <td>{{$od->id}}</td>
                                <td>{{$od->customer_id}}</td>
                                <td>{{$od->table_id}}</td>
                                <td>{{$od->time}}</td>
                                <td>
                                    <form method="POST" action="{{ route('backstage.chef.detail.index',$od->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('get') }}
                                        <div>
                                            <button type="submit" class="btn btn-primary col-md-11 ">
                                                進入明細
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
