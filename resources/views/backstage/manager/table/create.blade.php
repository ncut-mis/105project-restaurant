@extends('backstage.manager.layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體"><i class="fa fa-plus-circle"></i>新增餐桌</font>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    @include('backstage.manager.layouts.partials.validation')

    <!-- /.row -->
    <div class="row justify-content-center">
        <form action="{{ route('backstage.manager.table.index') }}" method="POST" role="form">{{ csrf_field() }}
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {{--桌號--}}
                        <div class="form-group row">
                            <label for="table" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('桌號') }}</font></label>
                            <div class="col-md-8">
                                <input id="table" type="text" class="form-control" name="table" placeholder="請輸入桌號" required>
                            </div>
                        </div>
                        {{--座位人數--}}
                        <div class="form-group row">
                            <label for="people" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('座位人數') }}</font></label>
                            <div class="col-md-8">
                                <input id="people" type="text" class="form-control" name="people" placeholder="請輸入人數" required>
                            </div>
                        </div>
                        {{--使用狀態--}}
                        <div class="form-group row">
                            <label for="status" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('使用狀態') }}</font></label>
                            <div class="col-md-8">
                                <input id="status" type="text" class="form-control" name="status" placeholder="請輸入狀態" required>
                            </div>
                        </div>
                        {{--新增--}}
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" style="text-align:center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('送出') }}
                                </button>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </form>
    </div>

@endsection
