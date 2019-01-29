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


@for($i=1;$i<51;$i++)
    ({{ $i }},	1,	{{ $i }},	0,	'2019-01-29 06:21:52',	'2019-01-29 06:21:52'),
    <br>
@endfor



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