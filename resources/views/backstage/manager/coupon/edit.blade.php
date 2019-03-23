@extends('backstage.layouts.master')
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體"><i class="fa fa-edit"></i>修改優惠券資料 </font>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('backstage.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <form action="/backstage/coupon/{{$coupons->id}}" method="POST" role="form">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {{--優惠券名稱--}}
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('優惠券名稱') }}</font></label>
                            <div class="col-md-8">
                                <input name="title" class="form-control" placeholder="請輸入優惠券名稱" value="{{$coupons->title}}" required>
                            </div>
                        </div>
                        {{--內容--}}
                        <div class="form-group row">
                            <label for="content" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('內容') }}</font></label>
                            <div class="col-md-8">
                                <input name="content" class="form-control" placeholder="請輸入內容" value="{{$coupons->content}}" required>
                            </div>
                        </div>
                        {{--折扣金額--}}
                        <div class="form-group row">
                            <label for="discount" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('折扣金額') }}</font></label>
                            <div class="col-md-8">
                                <input name="discount" class="form-control" placeholder="請輸入折扣金額" value="{{$coupons->discount}}" required>
                            </div>
                        </div>
                        {{--最低消費金額--}}
                        <div class="form-group row">
                            <label for="lowestprice" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('最低消費金額') }}</font></label>
                            <div class="col-md-8">
                                <input name="lowestprice" class="form-control" placeholder="請輸入最低消費金額" value="{{$coupons->lowestprice}}">
                            </div>
                        </div>
                        {{--開始時間--}}
                        <div class="form-group row">
                            <label for="StartTime" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('開始時間') }}</font></label>
                            <div class="col-md-8">
                                <input class="form-control" name="StartTime" value="{{$coupons->StartTime}}" placeholder="請輸入開始時間" required>
                            </div>
                        </div>
                        {{--結束時間--}}
                        <div class="form-group row">
                            <label for="EndTime" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('結束時間') }}</font></label>
                            <div class="col-md-8">
                                <input class="form-control" name="EndTime" value="{{$coupons->EndTime}}" placeholder="請輸入結束時間" required>
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
