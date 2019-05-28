@extends('backstage.manager.layouts.master')
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體"><i class="fa fa-edit"></i>修改公告 </font>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('backstage.manager.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <form action="/backstage/post/{{$posts->id}}" method="POST" role="form" enctype ="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {{--圖片--}}
                        <div class="form-group row{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="logo" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('圖片') }}</font></label>
                            <div class="col-md-8">
                                <input type="file" name="pic" class="form-control" accept ="image/*">
                            </div>
                        </div>
                        {{--標題--}}
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('標題') }}</font></label>
                            <div class="col-md-8">
                                <input name="title" class="form-control" placeholder="請輸入標題" value="{{$posts->title}}" required>
                            </div>
                        </div>
                        {{--內容--}}
                        <div class="form-group row">
                            <label for="content" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('內容') }}</font></label>
                            <div class="col-md-8">
                                <textarea name="content" class="form-control" placeholder="請輸入內容" required>{{$posts->content}}</textarea>
                            </div>
                        </div>
                        {{--日期--}}
                        <div class="form-group row">
                            <label for="discount" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('張貼日期') }}</font></label>
                            <div class="col-md-8">
                                <input name="DateTime" class="form-control" placeholder="請輸入日期" value="{{$posts->DateTime}}" required>
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
