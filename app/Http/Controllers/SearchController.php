<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SearchController extends Controller

{

    private $type = [];

    public function index()
    {
        return view('index');
    }

    public function sendRequest(Request $request)
    {

        $q = $request->get('query');
        //  $type = 'type='.$type;

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.spotify.com/v1/search',
        ]);

        $auth = new SpotifyController();
        $head = $auth->getAccessToken();

        $response = $client->request('GET', '', [
            'query' => [
                'q' => $q,
                'type' => 'track,artist,album',
                'limit' => 3,
                'offset' => 0,
            ],
            'headers' => [
                'Content-Type' => 'application/json',
                'Accepts' => 'application/json',
                'Authorization' => $head,
            ],
        ]);

        $body = json_decode((string) $response->getBody());

        //dd($body);
        return $body;
    }


    public function search(Request $request)
    {
        $query = $request->get('query');
        $data = $this->sendRequest($request);

        $album = $data->albums->items;
        $artists = $data->artists->items;
        $tracks = $data->tracks->items;


        // dd($data);
        return view(
            'search',
            [
                'searchTerm' => $query,
                'album' => $album,
                'artist' => $artists,
                'track' => $tracks
            ]
        );
    }
}
