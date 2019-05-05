@extends('backstage.manager.layouts.master')
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體"><i class="fa fa-edit"></i> 修改Token </font>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('backstage.manager.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <form action="/backstage/token/{{$restaurant->id}}" method="POST" role="form">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" style="border:3px #9BA2AB solid;">
                    <thead style="border:2px #9BA2AB solid;">
                    <tr style="background-color: lightgrey;">
                        <th width="700" style="text-align: center">Token</th>
                        <th width=50" style="text-align: center">送出</th>
                    </tr>
                    </thead>
                    <tbody style="border:3px #9BA2AB solid;">
                        <tr>
                            <td>
                                <input name="token" class="form-control" placeholder="請輸入名稱" value="{{$restaurant->token}}" required>
                            </td>
                            <td>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">更新</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>

<!-- /.row -->
@endsection
