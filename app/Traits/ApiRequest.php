<?php

namespace App\Traits;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

trait ApiRequest
{
    protected $client;

    public function apiRequest($method, $endpoint, $parameters = [], $type = 'form_params')
    {
        $client = new Client();
        $response = $client->request($method, $endpoint, $this->getParams($parameters, $type));
        $responseBody = json_decode($response->getBody());
        Log::info('API Response', [$responseBody]);
        return $responseBody;
    }
    private function getParams(array $data, $type)
    {
        if ($type === 'multipart') {
            $params = [
                'multipart' => []
            ];
            foreach ($data as $key => $value) {
                array_push($params['multipart'], ['name' => $key, 'contents' => !is_file($value) ? $value : fopen($value, 'r')]);
            }
            return $params;
        }
        return [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'form_params' => $data
        ];
    }
}
