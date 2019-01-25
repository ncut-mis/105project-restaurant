@extends('layouts.back')
<head>
<style>
    .pic {
        position:relative;
        width: 180px;
        height: 180px;
        overflow: hidden;
        border-radius:50%;
    }
    .pic img {
        width: 100%;
        height: auto;

    }

    /*.body {*/
    /*!* background-image: url("https://unsplash.com/photos/gFyy2Po7T-k") ; *!*/
    /*background-color: #FF3333;*/
    /*}*/
</style>
</head>

@section('content')
    @foreach($staffs as $sts)
    {{$sts->name}}
    @endforeach
    @endsection