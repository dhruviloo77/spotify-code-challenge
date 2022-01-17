<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;


class SpotifyController extends Controller
{
    public function getAccessToken()
    {

        $client_id = config('services.spotify.client_id'); // Spotify App Client Id 
        $client_secret = config('services.spotify.client_secret'); // Spotify App Client Secret
        $header = 'Basic ' . base64_encode($client_id . ":" . $client_secret); // Base 64 Encoding for Id & Secret for Authorization field 


        // Creating New Client and assigning base url
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://accounts.spotify.com',
        ]);

        // Guzzle POST Magic Method connecting to /api/token endpoint
        $response = $client->request('POST', '/api/token', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accepts' => 'application/json',
                'Authorization' => $header,
            ],
            'form_params' => [ // 'form_params' and not 'body' because of x-www-form-urlencoded (Mandatory)
                'grant_type' => 'client_credentials',
            ],
        ]);

        $body = json_decode((string) $response->getBody()); //Decoding JSON data to fetch String Values

        return $body->token_type . ' ' . $body->access_token;
    }
}
