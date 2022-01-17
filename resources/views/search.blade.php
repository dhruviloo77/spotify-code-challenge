<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Code Challenge</title>
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: sans-serif;
            height: 100vh;
            margin: 50px;
        }

        .full-height {
            height: 100vh;
        }

        p,
        li {
            font-family: verdana;
            color: black;
        }

        .row {
            display: block;
            width: auto;
        }

        img {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="full-height">
        <div class="result">
            Your Search Term Was: <b>{{$searchTerm}}</b>
        </div>


        <div class="d-flex">

            <ul class="row p-3 m-3">
                <p class="text-center">Albums</p>
                @foreach($album as $a)
                <a href="{{ $a->type.'/'.$a->id }}">
                    <li class="list-group-item bg-success text-dark"> <span><img src="{{ $a->images[0]->url }}" width="100"></span> <br> {{ $a->name }}</li>
                </a>
                <br>
                @endforeach
            </ul>

            <ul class="row p-3 m-2">
                <p class="text-center">Artists</p>
                @foreach($artist as $ar)
                <a href="{{ $ar->type.'/'.$ar->id }}">
                    <li class="list-group-item bg-success text-dark"> <span><img src="@if($ar->images) {{ $ar->images[0]->url }} @endif" alt="No Thumbnail" width="100"></span> <br> {{ $ar->name }} </li>
                </a>
                <br>
                @endforeach
            </ul>

            <ul class="row p-3 m-2">
                <p class="text-center">Tracks</p>
                @foreach($track as $t)
                <a href="{{ $t->type.'/'.$t->id }}">
                    <li class="list-group-item bg-success text-dark"> <span><img src="{{ $t->album->images[0]->url }}" width="100"></span> <br> {{ $t->name }} </li>
                </a>
                <br>
                @endforeach
            </ul>

        </div>
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