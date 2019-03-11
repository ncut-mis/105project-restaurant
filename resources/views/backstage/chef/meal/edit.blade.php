@extends('backstage.layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體"><i class="fa fa-edit"></i>修改餐點資料 </font>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    @include('backstage.layouts.partials.validation')
    <!-- /.row -->
    <div class="row" style="text-align:center" >
        餐點類型：輸入1代表主餐、2代表開胃品、3代表沙拉、4代表前菜、5代表湯品、6代表甜品、7代表飲料。
    </div>
    <div class="row">
        <form action="/backstage/chef/meal/{{$meal->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="col-md-12">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            {{--餐點類型--}}
                            <div class="form-group row">
                                <label for="meal_types_id" class="col-md-4 col-form-label" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('餐點類型') }}</font></label>
                                <div class="col-md-8">
                                    <input name="meal_types_id" class="form-control" placeholder="請輸入名稱" value="{{$meal->meal_types_id}}" required>
                                </div>
                            </div>
                            {{--名稱--}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('名稱') }}</font></label>
                                <div class="col-md-8">
                                    <input name="name" class="form-control" placeholder="請輸入名稱" value="{{$meal->name}}" required>
                                </div>
                            </div>
                            {{--照片--}}
                            <div class="form-group row">
                                <label for="position" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('照片') }}</font></label>
                                <div class="col-md-8">
                                    <input name="photo" class="form-control" placeholder="請輸入照片網址" value="{{$meal->photo}}" required>
                                </div>
                            </div>
                            {{--原料說明--}}
                            <div class="form-group row">
                                <label for="phone" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('原料說明') }}</font></label>
                                <div class="col-md-8">
                                    <input name="ingredients" class="form-control" placeholder="請輸入原料說明" value="{{$meal->ingredients}}" required>
                                </div>
                            </div>
                            {{--價錢--}}
                            <div class="form-group row">
                                <label for="address" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('價錢') }}</font></label>
                                <div class="col-md-8">
                                    <input name="price" class="form-control" placeholder="請輸入價錢" value="{{$meal->price}}">
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
