<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ShippingPartner
{
    public function generateToken()
    {
        $url = 'https://stoplight.io/mocks/illuminate/illuminate-webhooks/13766107/aaa/api/v1/oauth/token';

        $response = Http::post($url, [
            'username' => 'me@home.com',
            'password' => 'my-super-strong-password',
        ]);

        $responseJson = json_decode($response, true);

        $statuscode = $response->getStatusCode();

        return ['code' => $statuscode, 'data' => $responseJson];
    }

    public function createShipping(Request $request)
    {
        $response = Http::withHeaders([
            'X-Auth-Api-Key' => 'BFdfTySEr3pcKqJTvVh0PWpQQXZb22nq-nmdMNtnmI',
        ])->post($url, $data);

        $responseJson = json_decode($response, true);

        $statuscode = $response->getStatusCode();

        return ['code' => $statuscode, 'data' => $responseJson];
    }

    public function retriveShipping()
    {
    }

    public function searchShipping()
    {
    }

    public function retriveShipmentStatus()
    {
    }
}
