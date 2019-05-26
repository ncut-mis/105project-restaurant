@extends('backstage.counter.layouts.master')
@section('content')

@foreach($order as $od)
    {{$od->number}}桌
    狀態：{{$od->status}}<br>
@endforeach

<p></p>
餐點內容：
<br>
@foreach($item as $it)
    {{$it->name}}
    x{{$it->quantity}}
    <br>
@endforeach

@foreach($abc as $a)
    <form action="{{route('counter.patch',$a->id)}}" method="POST">
        <br>
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <button type="submit">
            送出至廚房
        </button>
    </form>
    @endforeach
<br>
<button>
    <a href="{{route('testing')}}">回上一頁</a>
</button>
    @endsection