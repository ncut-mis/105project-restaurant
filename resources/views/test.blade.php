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


<div class="row">
    <div class="col-lg-12">
        <form class="col-md-12" role="form" id="CheckTable"
              action="{{ route('restaurant.table.check',Auth::user()->restaurant_id) }}">
            {{ csrf_field() }}
            <input type="checkbox" id="{{$table->table}}" name="check[]"
                   value="6">
        </form>
    </div>
</div>

<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Collapsible Group Item #1
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Collapsible Group Item #1
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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