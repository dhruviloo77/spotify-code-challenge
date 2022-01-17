<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Info</title>
    <style>
        html,
        body {
            background-color:#fff;
            color: #636b6f;
            font-family: sans-serif;
            height: 40vh;
            margin: 10px;
        }

        p {
            font-size: 30px;
            font-family: verdana;
            color: black;
        }

        .full-height {
            height: 100vh;
        }

        hr {
            height: 5px;
            width: 80px;
            border-radius: 80px;
            background-color: black;
        }

        .row {
            display: block;
            width: auto;
        }

        img {
            border-radius: 100px;
        }
    </style>
</head>

<body>
    <div class="full-height">

        <p class="text-center">{{ucfirst($data->type)}} : {{$data->name}}</p>

        <div class="d-flex">

            <ul class="row p-3 m-2">

                <li class="list-group-item bg-success text-dark rounded-circle">

                    <img src="@if($data->type == 'track') {{ $data->album->images[0]->url }} @else {{ $data->images[0]->url }} @endif">
                </li>
            </ul>

            <ul class="row mx-auto" style="width: 500px; text-align: center; padding-top: 150px">
                @if($data->type == 'track')
                <p class="text-center">Duration : {{ gmdate("H:i", $data->duration_ms) }}</p>
                <hr />
                @endif

                @if( $data->type == 'artist' )
                <p class="text-center"> Followers: {{ $data->followers->total }} </p>
                <hr />
                @elseif( $data->type == 'album' )
                <p class="text-center"> Total Tracks : {{ $data->tracks->total }} </p>
                <hr />
                @endif

                @if( $data->type == 'track' || $data->type == 'album')
                <p class="text-center"> By : {{$data->artists[0]->name}}
                    <hr />
                    <p class="text-center"> Release Date : @if( $data->type == 'track' ) {{$data->album->release_date}} @elseif( $data->type == 'album' ) {{$data->release_date}} @endif</p>
                <hr />
                @endif
              

                <a href="{{$data->external_urls->spotify}}" type="button" class="btn btn-success">Listen Now</a>
                </li>

            </ul>

        </div>
    </div>
</body>

</html>