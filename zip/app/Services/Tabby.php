<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Tabby
{
    public function generateSession()
    {
        $url = 'https://api.tabby.ai/api/v2/checkout';

        $data['payment']['amount'] = 200;
        $data['payment']['currency'] = 'AED';

        $data['payment']['buyer']['phone'] = '+919878987897';
        $data['payment']['buyer']['email'] = 'dhruvil@finlark.com';
        $data['payment']['buyer']['name'] = 'Dhruvil Modi';

        $data['payment']['shipping_address']['city'] = 'Ahmedabad';
        $data['payment']['shipping_address']['address'] = '410, Shivalik Abaise, Opp Shell petrol pump';
        $data['payment']['shipping_address']['zip'] = 300015;

        $data['payment']['order']['reference_id'] = rand(11111, 99999);

        $items['title'] = 'Men\' Blue Shirt';
        $items['quantity'] = 1;
        $items['unit_price'] = 200;
        $items['category'] = 'Cloths';

        $data['payment']['order']['items'][] = $items;

        $data['payment']['buyer_history']['registered_since'] = date('Y-m-d H:i:s', strtotime('-6 months'));
        $data['payment']['buyer_history']['loyalty_level'] = 0;

        $data['payment']['order_history']['purchased_at'] = date('Y-m-d H:i:s');
        $data['payment']['order_history']['amount'] = 200;

        $data['lang'] = 'en';
        $data['merchant_code'] = 'JM';

        $data['merchant_urls']['success'] = 'https://jmarkt.fltstaging.com/hadle-success-response';
        $data['merchant_urls']['cancel'] = 'https://jmarkt.fltstaging.com/handle-cancel-response';
        $data['merchant_urls']['failure'] = 'https://jmarkt.fltstaging.com/handle-failed-response';

        echo json_encode($data);
        exit;

        $this->connect($url, $data, 'post');
    }

    public function connect($url, $data, $method)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'bearer pk_test_337629a6-ee77-435e-ac9c-fc2d35301fdc',
        ])->{$method}($url, $data);

        $responseJson = json_decode($response, true);

        echo '<pre>';
        print_r($responseJson);
        exit;

        return $res;
    }
}
