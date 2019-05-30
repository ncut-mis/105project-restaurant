@extends('backstage.counter.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">用餐中_Dining</font>
            </h1>
        </div>
    </div>
    ♥結帳畫面♥
    <br>
    <br>
@foreach($order as $od)
    {{$od->name}}
    　　　　　x{{$od->quantity}}
    　　　　　{{$od->price}}
    <br>
    <br>
    @endforeach
    <br>
    <br>
@foreach($total as $td)
    <div class="col-md-4">
        　　　　　    　　　　　    　　　　　        　　
        <form action="{{route('counter.checkouting',$td->id)}}" method="POST">
            <br>
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="hidden" name="status" value="已結帳">
            <p>總價：<input name="total" value="{{$td->total}}"></p>
            <button type="submit" class="btn btn-primary">
                完成結帳
            </button>
        </form>
    </div>

    @endforeach


@endsection