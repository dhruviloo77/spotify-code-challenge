<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class InfoController extends Controller
{

    public function getAccessToken()
    {

        $auth = new SpotifyController();
        $head = $auth->getAccessToken();

        return $head;
    }

    public function getInfo($type, $href)
    {

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.spotify.com/v1/',
        ]);

        $response = $client->request('GET', $type . 's/' . $href, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accepts' => 'application/json',
                'Authorization' => $this->getAccessToken(),
            ],
        ]);

        $body = json_decode((string) $response->getBody());

        return view('info', ['data' => $body]);
    }
}
