@extends('backstage.layouts.master')
@section('content')

    <script>
        function ConfirmCreate()
        {
            var x = confirm("你確定要新增此優惠券嗎?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體"><i class="fa fa-plus-circle"></i>新增優惠券 </font>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    @include('backstage.layouts.partials.validation')

    <!-- /.row -->
    <div class="row justify-content-center">
        <form action="{{ route('backstage.manager.coupon.index') }}" method="POST" role="form">{{ csrf_field() }}
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {{--優惠券名稱--}}
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('優惠券名稱') }}</font></label>
                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" required autofocus>
                            </div>
                        </div>
                        {{--內容--}}
                        <div class="form-group row">
                            <label for="content" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('內容') }}</font></label>
                            <div class="col-md-8">
                                <input id="content" type="text" class="form-control" name="content" required>
                            </div>
                        </div>
                        {{--折扣金額--}}
                        <div class="form-group row">
                            <label for="discount" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('折扣金額') }}</font></label>
                            <div class="col-md-8">
                                <input id="discount" type="text" class="form-control" name="discount" required>
                            </div>
                        </div>
                        {{--最低消費金額--}}
                        <div class="form-group row">
                            <label for="lowestprice" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('最低消費金額') }}</font></label>
                            <div class="col-md-8">
                                <input id="lowestprice" type="text" class="form-control" name="lowestprice" required>
                            </div>
                        </div>
                        {{--開始時間--}}
                        <div class="form-group row">
                            <label for="StartTime" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('開始時間') }}</font></label>
                            <div class="col-md-8">
                                <input id="StartTime" type="datetime-local" class="form-control" name="StartTime" required>
                            </div>
                        </div>
                        {{--結束時間--}}
                        <div class="form-group row">
                            <label for="EndTime" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('結束時間') }}</font></label>
                            <div class="col-md-8">
                                <input id="EndTime" type="datetime-local" class="form-control" name="EndTime" required>
                            </div>
                        </div>
                        {{--Logo圖片檔--}}
                        {{--<div class="form-group">--}}
                            {{--<label>上傳圖片</label>--}}
                            {{--<input type="file"  class="form-control" name="picture" id="picture"  >--}}
                        {{--</div>--}}
                        {{--確認--}}
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3" style="text-align:center">
                                <button type="submit" class="btn btn-primary">
                                    確認新增
                                </button>
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
        </form>
    </div>

@endsection
