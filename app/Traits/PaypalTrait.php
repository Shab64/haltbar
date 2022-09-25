<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait PaypalTrait
{
    private $access_token;
    private $client_id;
    private $secret_key;

    function setKeys($access_token, $client_id, $secret_key)
    {
        $this->access_token = $access_token;
        $this->client_id = $client_id;
        $this->secret_key = $secret_key;
    }

    function createPaypalProduct($product_name)
    {
        $response = Http::withHeaders([
            "Content-type" => "application/json",
            "Authorization" => "Bearer " . $this->access_token
        ])->post('https://api-m.sandbox.paypal.com/v1/catalogs/products', [
            "name" => $product_name
        ]);

        if ($response->successful()) {
            $arr = array('status' => $response->status(), 'result' => $response->json());
        } else {
            $arr = array('status' => $response->status(), 'body' => $response->body());
        }
        return $arr;
    }

    function createPaypalPlan($product_id, $plan_name, $interval, $price)
    {
        $upperCaseInterval = strtoupper($interval);
        $response = Http::withHeaders([
            "Content-type" => "application/json",
            "Authorization" => "Bearer " . $this->access_token,
        ])->post('https://api-m.sandbox.paypal.com/v1/billing/plans', [
            "product_id" => $product_id,
            "name" => $plan_name,
            "billing_cycles" => [
                [
                    "frequency" => [
                        "interval_unit" => $upperCaseInterval,
                        "interval_count" => 1
                    ],
                    "tenure_type" => "REGULAR",
                    "sequence" => 1,
                    "total_cycles" => 12,
                    "pricing_scheme" => [
                        "fixed_price" => [
                            "value" => $price,
                            "currency_code" => "USD"
                        ]
                    ]
                ]
            ],
            "payment_preferences" => [
                "auto_bill_outstanding" => true,
                "setup_fee" => [
                    "value" => "0",
                    "currency_code" => "USD"
                ],
                "setup_fee_failure_action" => "CONTINUE",
                "payment_failure_threshold" => 3
            ],
            "quantity_supported" => true
        ]);

        if ($response->successful()) {
            $arr = array('status' => $response->status(), 'result' => $response->json());
        } else {
            $arr = array('status' => $response->status(), 'body' => $response->json());
        }
        return $arr;
    }
}
