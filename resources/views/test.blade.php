<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        [draggable="true"] {

            user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }

        #drag-drop-basic {
            display: flex;
        }

        #source-container {
            height: 400px;
            border: 1px solid #CCC;
            flex: 1;
            margin: 1rem;
        }

        #target-container {
            height: 400px;
            border: 1px solid #CCC;
            flex: 1;
            margin: 1rem;
        }

        #drag-source {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: steelblue;
        }
    </style>
</head>

<body>
<h1>You can drag the blue circle from left to right</h1>

<div id="drag-drop-basic">
    <div id="source-container">
        <div id="drag-source" draggable="true"></div>
    </div>
    <div id="target-container"></div>
</div>

@php
    $x=5;
    $h=1;
@endphp
@if ( $x === 5  && $h === 1)
    我有一條記錄！
@else
    我沒有任何記錄！
@endif



@php
    $o=0;
    $j=1;
@endphp
@for($i=101;$i<151;$i++)
    @php
        $o++
    @endphp
    @if($o == 11)
        @php
            $o=1;
            $j++;
        @endphp
    @endif
    ({{$i}}, 3,	{{$i-100}},	'空閒中', {{$j}}, {{$o}}, '2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
    <br>
@endfor


----------------------
<br>

@php
    $a='16156655635211171012321710';
    $b=strlen( $a );
@endphp
@for ($i=0;$i<=$b;$i=$i+1)
    @php
        switch ( substr( $a,$i,1)) {
         case "0":
               echo "NOTE_,";
               break;
           case "1":
               echo "NOTE_C4,";
               break;
           case "2":
               echo "NOTE_D4,";
               break;
           case "3":
               echo "NOTE_E4,";
               break;
           case "4":
               echo "NOTE_F4,";
               break;
           case "5":
               echo "NOTE_G4,";
               break;
           case "6":
               echo "NOTE_A4,";
               break;
           case "7":
               echo "NOTE_B4,";
               break;
       }
    @endphp
@endfor
<br>
我是{{$b}}個
<br>
@for ($i=0;$i<$b;$i=$i+1)
    16,

@endfor
<br>
{{--驗證碼產生--}}
--------------------------------------------
<br>
@php
    $random=30;
    $randoma="";
@endphp
@for ($i=1;$i<=$random;$i=$i+1)
    @php
        $c=rand(1,3);
    @endphp
    @if($c==1)
        @php
            $a=rand(97,122);
            $b=chr($a);
        @endphp
    @endif
    @if($c==2)
        @php
            $a = rand(65,90);
            $b=chr($a);
        @endphp
    @endif
    @if($c==3)
        @php
            $b=rand(0,9);
        @endphp
    @endif
    @php
        $randoma=$randoma.$b;
    @endphp
@endfor
{{$randoma}}
<br>
------------------------------------


<div class="visible-print text-center">
    {!! QrCode::size(100)->generate(Request::url()); !!}
    <p>Scan me to return to the original page.</p>
</div>


<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                    Collapsible Group Item #1
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                    Collapsible Group Item #1
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
</div>

<script>
    let dragSource = document.querySelector('#drag-source');
    dragSource.addEventListener('dragstart', dragStart);

    let dropTarget = document.querySelector('#target-container');
    dropTarget.addEventListener('drop', dropped);
    dropTarget.addEventListener('dragenter', cancelDefault);
    dropTarget.addEventListener('dragover', cancelDefault);

    function cancelDefault(e) {
        e.preventDefault();
        e.stopPropagation();
        return false
    }

    function dragStart(e) {
        console.log('dragStart');
        e.dataTransfer.setData('text/plain', e.target.id)
    }

    function dropped(e) {
        console.log('dropped');
        cancelDefault(e);
        let id = e.dataTransfer.getData('text/plain');
        e.target.appendChild(document.querySelector('#' + id))
    }
</script>
</body>

</html>