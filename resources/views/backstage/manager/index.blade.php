@extends('backstage.manager.layouts.master')
@section('content')
<!-- Page Heading -->
<div class="row" style="background-color: #a1cbef">
    <div class="col-lg-12">
        <h1 class="page-header">
            @foreach($restaurants as $res)
                <font color="#000000" face="微軟正黑體"><i class="fa fa-home"></i>{{$res->name}}Home<small></small></font>
            @endforeach
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row" style="background-color: #a1cbef">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
<!-- /.row -->

@endsection
