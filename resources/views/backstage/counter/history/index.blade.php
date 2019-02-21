@extends('backstage.counter.layouts.master')
<head>
    <style>
        .style-four {
            height: 12px;
            border: 0;
            box-shadow: inset 0 12px 12px -12px rgba(0,0,0,0.5);
        }
    </style>
</head>
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體">歷史用餐紀錄_History</font>
        </h1>
    </div>
</div>

<table class="table table-bordered table-hover">

    <tbody>
    <tr>
        <td bgcolor="gray" width="90px" style="text-align: center">
            <h5><font face="微軟正黑體" color="white">顧客編號</font></h5>
        </td>
        <td bgcolor="gray" width="90px" style="text-align: center">
            <h5><font face="微軟正黑體" color="white">會員</font></h5>
        </td>
        <td bgcolor="gray" width="90px" style="text-align: center">
            <h5><font face="微軟正黑體" color="white">日期</font></h5>
        </td>
        <td bgcolor="gray" width="90px" style="text-align: center">
            <h5><font face="微軟正黑體" color="white">入座時間</font></h5>
        </td>
        <td bgcolor="gray" width="90px" style="text-align: center">
            <h5><font face="微軟正黑體" color="white">人數</font></h5>
        </td>
        <td bgcolor="gray" width="90px" style="text-align: center">
            <h5><font face="微軟正黑體" color="white">桌號</font></h5>
        </td>
        <td bgcolor="gray" width="60px" style="text-align: center">
            <h5><font face="微軟正黑體" color="white">餐點</font></h5>
        </td>
        <td bgcolor="gray" width="90px" style="text-align: center">
            <h5><font face="微軟正黑體" color="white">結帳金額</font></h5>
        </td>
    </tr>
    <tbody>
        <tr>
            <td style="text-align: center">1</td>
            <td style="text-align: center">李娜</td>
            <td style="text-align: center">2019/2/10</td>
            <td style="text-align: center">12:30</td>
            <td style="text-align: center">4人</td>
            <td style="text-align: center">第5桌</td>
            <td style="text-align: center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細餐點
                </button>
            </td>
            <td style="text-align: center">2,800元</td>
        </tr>
        <tr>
            <td style="text-align: center">2</td>
            <td style="text-align: center">林俊傑</td>
            <td style="text-align: center">2019/2/12</td>
            <td style="text-align: center">12:00</td>
            <td style="text-align: center">2人</td>
            <td style="text-align: center">第3桌</td>
            <td style="text-align: center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                    詳細餐點
                </button>
            </td>
            <td style="text-align: center">1,500元</td>
        </tr>
        <tr>
            <td style="text-align: center">3</td>
            <td style="text-align: center">韓國瑜</td>
            <td style="text-align: center">2019/2/15</td>
            <td style="text-align: center">13:00</td>
            <td style="text-align: center">3人</td>
            <td style="text-align: center">第1桌</td>
            <td style="text-align: center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter3">
                    詳細餐點
                </button>
            </td>
            <td style="text-align: center">2,500元</td>
        </tr>
    </tbody>
</table>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 ><font face="微軟正黑體"><b>餐點內容(會員_李娜)</b></font></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        主餐
                    </div>
                    <div class="col-md-4">
                        香煎鴨胸佐櫻桃紅酒醬
                        <br>
                        蒜香奶油肩胛菲力
                        <br>
                        海陸雙拼(雞腿+魚排)
                    </div>
                    <div class="col-md-1">
                        x2
                        <br>
                        x1
                        <br>
                        x1
                    </div>
                    <div class="col-md-2">
                        720
                        <br>
                        360
                        <br>
                        360
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        開胃品
                    </div>
                    <div class="col-md-4">
                        優格鮮蝦時蔬
                    </div>
                    <div class="col-md-1">
                        x4
                    </div>
                    <div class="col-md-2">
                        200
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        沙拉
                    </div>
                    <div class="col-md-4">
                        燻鴨蘿美生菜
                        <br>
                        時令水果
                        <br>
                        洋芋沙拉
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x1
                        <br>
                        x2
                    </div>
                    <div class="col-md-2">
                        80
                        <br>
                        80
                        <br>
                        160
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        前菜
                    </div>
                    <div class="col-md-4">
                        焗烤蘑菇+方塊麵包
                    </div>
                    <div class="col-md-1">
                        x4
                    </div>
                    <div class="col-md-2">
                        240
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        湯品
                    </div>
                    <div class="col-md-4">
                        義式海鮮清湯
                        <br>
                        法式花菜濃湯
                        <br>
                        杏鮑菇南瓜濃湯
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x2
                        <br>
                        x1
                    </div>
                    <div class="col-md-2">
                        80
                        <br>
                        160
                        <br>
                        80
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        甜點
                    </div>
                    <div class="col-md-4">
                        黑糖布蕾
                        <br>
                        覆盆子奶酪
                        <br>
                        巧克力袋冰淇淋
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x1
                        <br>
                        x2
                    </div>
                    <div class="col-md-2">
                        60
                        <br>
                        60
                        <br>
                        120
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        飲料
                    </div>
                    <div class="col-md-4">
                        荔香彩蝶(孕婦不宜)
                        <br>
                        繽紛水果茶
                        <br>
                        布蕾香紅
                        <br>
                        紅絲絨奶茶(熱)
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x1
                        <br>
                        x1
                        <br>
                        x1
                    </div>
                    <div class="col-md-2">
                        60
                        <br>
                        60
                        <br>
                        60
                        <br>
                        60
                    </div>
                </div>

                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8 style-four">
                        <p align=right><font face="微軟正黑體"><b>金額總計：3,000元</b></font></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">確認</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 ><font face="微軟正黑體"><b>餐點內容(會員_林俊傑)</b></font></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        主餐
                    </div>
                    <div class="col-md-4">
                        香煎鴨胸佐櫻桃紅酒醬
                        <br>
                        蒜香奶油肩胛菲力
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x1
                    </div>
                    <div class="col-md-2">
                        360
                        <br>
                        360
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        開胃品
                    </div>
                    <div class="col-md-4">
                        優格鮮蝦時蔬
                    </div>
                    <div class="col-md-1">
                        x2
                    </div>
                    <div class="col-md-2">
                        100
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        沙拉
                    </div>
                    <div class="col-md-4">
                        燻鴨蘿美生菜
                        <br>
                        時令水果
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x1
                    </div>
                    <div class="col-md-2">
                        80
                        <br>
                        80
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        前菜
                    </div>
                    <div class="col-md-4">
                        焗烤蘑菇+方塊麵包
                    </div>
                    <div class="col-md-1">
                        x2
                    </div>
                    <div class="col-md-2">
                        120
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        湯品
                    </div>
                    <div class="col-md-4">
                        義式海鮮清湯
                        <br>
                        杏鮑菇南瓜濃湯
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x1
                    </div>
                    <div class="col-md-2">
                        80
                        <br>
                        80
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        甜點
                    </div>
                    <div class="col-md-4">
                        黑糖布蕾
                        <br>
                        巧克力袋冰淇淋
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x1
                    </div>
                    <div class="col-md-2">
                        60
                        <br>
                        60
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        飲料
                    </div>
                    <div class="col-md-4">
                        荔香彩蝶(孕婦不宜)
                        <br>
                        繽紛水果茶
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x1
                    </div>
                    <div class="col-md-2">
                        60
                        <br>
                        60
                    </div>
                </div>

                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8 style-four">
                        <p align=right><font face="微軟正黑體"><b>金額總計：1,500元</b></font></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">確認</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 ><font face="微軟正黑體"><b>餐點內容(會員_韓國瑜)</b></font></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        主餐
                    </div>
                    <div class="col-md-4">
                        香煎鴨胸佐櫻桃紅酒醬
                        <br>
                        蒜香奶油肩胛菲力
                        <br>
                        海陸雙拼(雞腿+魚排)
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x1
                        <br>
                        x1
                    </div>
                    <div class="col-md-2">
                        360
                        <br>
                        360
                        <br>
                        360
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        開胃品
                    </div>
                    <div class="col-md-4">
                        優格鮮蝦時蔬
                    </div>
                    <div class="col-md-1">
                        x3
                    </div>
                    <div class="col-md-2">
                        150
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        沙拉
                    </div>
                    <div class="col-md-4">
                        燻鴨蘿美生菜
                        <br>
                        時令水果
                        <br>
                        洋芋沙拉
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x1
                        <br>
                        x1
                    </div>
                    <div class="col-md-2">
                        80
                        <br>
                        80
                        <br>
                        80
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        前菜
                    </div>
                    <div class="col-md-4">
                        焗烤蘑菇+方塊麵包
                    </div>
                    <div class="col-md-1">
                        x3
                    </div>
                    <div class="col-md-2">
                        180
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        湯品
                    </div>
                    <div class="col-md-4">
                        義式海鮮清湯
                        <br>
                        法式花菜濃湯
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x2
                    </div>
                    <div class="col-md-2">
                        80
                        <br>
                        160
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        甜點
                    </div>
                    <div class="col-md-4">
                        巧克力袋冰淇淋
                    </div>
                    <div class="col-md-1">
                        x3
                    </div>
                    <div class="col-md-2">
                        180
                    </div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        飲料
                    </div>
                    <div class="col-md-4">
                        繽紛水果茶
                        <br>
                        布蕾香紅
                        <br>
                        紅絲絨奶茶(熱)
                    </div>
                    <div class="col-md-1">
                        x1
                        <br>
                        x1
                        <br>
                        x1
                    </div>
                    <div class="col-md-2">
                        60
                        <br>
                        60
                        <br>
                        60
                    </div>
                </div>

                <div class="row" style="padding-top:10px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8 style-four">
                        <p align=right><font face="微軟正黑體"><b>金額總計：2,250元</b></font></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">確認</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
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
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
@endsection
