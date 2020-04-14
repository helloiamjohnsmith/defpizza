<?php


namespace App\Actions;


use Illuminate\Support\Facades\Http;

class ConvertEurToUsd
{
    public function run(int $euro): float
    {
        $response = Http::get('https://api.exchangeratesapi.io/latest');

        return round($euro * $response->json()['rates']['USD'], 2);
    }
}