<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Code Challenge</title>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: sans-serif;
            height: 100vh;
            margin: 50px;
        }

        .full-height {
            height: 100vh;
        }

        .result {
        }
    </style>
</head>
<body>
<div class="full-height">
    <div class="result">
        Your Search Term Was: <b>{{$searchTerm}}</b>
    </div>


<div class="container">

    <div class="row">

        <ul class="column p-3">
        @foreach($album as $d)
            <li class="list-group-item active"> {{ $d->name }} <span><img src="{{ $d->images[0]->url }}" width="100"></span></li>
        @endforeach
        </ul>

        <ul class="column p-3">
        @foreach($artist as $d)
            <li class="list-group-item active"> {{ $d->name }} <span><img src="{{ $d->images[0]->url }}" width="100"></span></li>
        @endforeach
        </ul>

        <ul class="column p-3">
        @foreach($track as $d)
            <li class="list-group-item active"> {{ $d->name }} <span><img src="{{ $d->album->images[0]->url }}" width="100"></span></li>
        @endforeach
        </ul>
        
        
        </div>
    </div>
</div>
</body>
</html>
