@extends('backstage.manager.layouts.master')
@section('content')

    <script>
        function ConfirmCreate()
        {
            var x = confirm("你確定要新增此公告嗎?");
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
                <font color="#000000" face="微軟正黑體"><i class="fa fa-plus-circle"></i>新增公告 </font>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    @include('backstage.manager.layouts.partials.validation')

    <!-- /.row -->
    <div class="row justify-content-center">
        <form action="{{ route('backstage.manager.post.index') }}" method="POST" role="form">{{ csrf_field() }}
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {{--標題--}}
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('標題') }}</font></label>
                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" required autofocus>
                            </div>
                        </div>
                        {{--內容--}}
                        <div class="form-group row">
                            <label for="content" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('內容') }}</font></label>
                            <div class="col-md-8">
                                <textarea id="content" type="text" class="form-control" name="content" required></textarea>
                            </div>
                        </div>
                        {{--日期--}}
                        <div class="form-group row">
                            <label for="DateTime" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('張貼日期') }}</font></label>
                            <div class="col-md-8">
                                <input id="DateTime" type="date" class="form-control" name="DateTime" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3" style="text-align:center">
                                <button type="submit" class="btn btn-primary">確認新增</button>
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
