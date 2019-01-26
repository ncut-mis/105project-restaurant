@extends('layouts.back')
@foreach($staffs as $sts)
    <div class="col-md-12">
        <div class="card" style="border-style:none;background-color:transparent;padding-top: 200px">
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card" style="border-style: none;background-color:transparent;">
                    <div class="card-body" style="padding-top:1px;">
                        <div class="row justify-content-center">
                            <label class=" col-md-8" style="text-align: center;font-family: 微軟正黑體 ;font-size: 38px;color:#FFFFFF;padding: 1px 1px 1px 1px;margin-top: 5px;background-color: transparent;border-style: none;">
                                {{$sts->position }}
                            </label>
                        </div>
                        <div class="row justify-content-center">
                            <label class=" col-md-8" style="text-align: center;font-family: 微軟正黑體 ;font-size: 38px;color:#FFFFFF;padding: 1px 1px 1px 1px;margin-top: 5px;background-color: transparent;border-style: none;">
                                {{$sts->name }}
                            </label>
                        </div>
                        <div class="row justify-content-center">
                            <a href="{{route('restaurant{id}.staffs.login',$sts->id)}}"><h1><font color="#ffffff" size="5" face="微軟正黑體"><b>選擇</b></font></h1></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach