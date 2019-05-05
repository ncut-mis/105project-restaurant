@extends('backstage.manager.layouts.master')
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體"><i class="fa fa-edit"></i>修改基本資料 </font>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('backstage.manager.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <form action="/backstage/information/{{Auth::user()->restaurant_id}}" method="POST" role="form" enctype ="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {{--店名--}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('餐廳名稱') }}</font></label>
                            <div class="col-md-8">
                                <input name="name" class="form-control" placeholder="請輸入姓名" value="{{$restaurants->name}}" required>
                            </div>
                        </div>
                        {{--Logo--}}
                        <div class="form-group row{{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label for="logo" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('Logo') }}</font></label>
                            <div class="col-md-8">
                                <input type="file" name="logo" class="form-control" accept ="image/*">
                            </div>
                        </div>
                        {{--電話--}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('電話') }}</font></label>
                            <div class="col-md-8">
                                <input name="phone" class="form-control" placeholder="請輸入電話" value="{{$restaurants->phone}}" required>
                            </div>
                        </div>
                        {{--地址--}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('地址') }}</font></label>
                            <div class="col-md-8">
                                <input name="address" class="form-control" placeholder="請輸入地址" value="{{$restaurants->address}}">
                            </div>
                        </div>
                        {{--營業時間_open--}}
                        <div class="form-group row">
                            <label for="opening_hours" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="4">{{ __('營業時間_Open') }}</font></label>
                            <div class="col-md-8">
                                <input name="OpenHour" type="time" class="form-control" placeholder="請輸入營業時間_open" value="{{$restaurants->OpenHour}}">
                            </div>
                        </div>
                        {{--營業時間_end--}}
                        <div class="form-group row">
                            <label for="end_hours" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="4">{{ __('營業時間_End') }}</font></label>
                            <div class="col-md-8">
                                <input name="EndHour" type="time" class="form-control" placeholder="請輸入營業時間_End" value="{{$restaurants->EndHour}}">
                            </div>
                        </div>
                        {{--更新--}}
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3" style="text-align:center">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">更新</button>
                                </div>
                            </div>
                            <div class="col-md-3" style="text-align:center">
                                <button type="button" onclick="history.back()" class="btn btn-danger">取消</button>
                            </div>
                            <div class="col-md-3"></div>
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
