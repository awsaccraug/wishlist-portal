<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ApiRequest
{
    protected $client;

    public function apiRequest($method, $endpoint, $parameters = null)
    {
        $client = new Client();
        $response = $client->request($method, $endpoint, [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'form_params' => $parameters
        ]);
        return json_decode($response->getBody());
    }
}
