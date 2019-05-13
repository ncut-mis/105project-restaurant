@extends('layouts.back')
@section('content')
    <div class="col-md-12">
        <div class="card" style="border-style:none;background-color:transparent;padding-top: 50px;text-align: center">
            {{--            <font color="#000000" face="微軟正黑體" size="100"><b>尚食併狂-餐廳後台</b></font>--}}
            <font color="#000000" face="微軟正黑體" size="100"><b>餐廳後台</b></font>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="card-header" style="text-align: center">
                            <font color="#737373" face="微軟正黑體" size="6"><b>{{ __('餐廳人員登入') }}</b></font>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="email" class="col-md-3" style="text-align:right;line-height:35px;"><font color="#000000" face="微軟正黑體" size="4"><b>{{ __('帳號　') }}</b></font></label>
                                <div class="col-md-9">
                                    <input id="email" type="email" name="email" value="" required="required" placeholder="請輸入信箱" autofocus="autofocus" class="form-control">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-3" style="text-align:right;line-height:35px;"><font color='#000000' face="微軟正黑體" size="4"><b>{{ __('密碼　') }}</b></font></label>
                                <div class="col-md-9">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="請輸入信箱">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary col-md-5" onclick="myFunction()">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var x = confirm("確定要登入?");
            if (x)
                return true;
            else
                alert("無此帳號或已被停權！若有任何問題，請與您的管理員聯絡！!");
        }
    </script>
@endsection
