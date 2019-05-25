@extends('backstage.counter.layouts.master')
@section('content')
    @foreach($order as $od)
        <form action="{{route('testing2',$od->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('get') }}
            <button class="btn btn-primary">
                <a href="">

                    <font color="#ffffff"> {{"點單-" . $od->id}}
                        <br>
                        等待確認餐點中</font>
                    <br></a>
            </button>
        </form>
        <form action="{{route('counter.check.patch',$od->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input name="status" type="hidden" class="form-control" value="出餐中" required>
            <button type="submit">送出該order至廚房</button>
        </form>
    @endforeach
    @endsection