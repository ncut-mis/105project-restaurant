@extends('backstage.manager.layouts.master')
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體"><i class="fa fa-home"></i>Home<small></small></font>
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row" style="background-color: #d6e9f9">
    <div class="col-md-2"></div>
    <div class="col-md-8" style="text-align: center">
        @foreach($restaurants as $res)
            <img src="{{url('img/logo/'. $res->logo_2)}}" width=63% alt="尷尬囉!">
        @endforeach
    </div>
    <div class="col-md-2"></div>
</div>
<!-- /.row -->

@endsection
