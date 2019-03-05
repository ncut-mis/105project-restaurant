@extends('backstage.layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體"><i class="fa fa-edit"></i>修改出餐狀態 </font>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    @include('backstage.layouts.partials.validation')
    <!-- /.row -->

    <div class="row">
        <form action="/backstage/chef/rcveod/{{$detail->order_id}}/{{$detail->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="col-md-12">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">

                            {{--名稱--}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('狀態') }}</font></label>
                                <div class="col-md-8">
                                    注意：輸入數字「1」為完成，輸入數字「0」為未完成。
                                    <input name="status" class="form-control" placeholder="請輸入狀態" value="{{$detail->status}}" required>
                                </div>
                            </div>
                            {{--更新--}}
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4" style="text-align:center">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success">更新</button>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
    </div>

    <!-- /.row -->
@endsection
