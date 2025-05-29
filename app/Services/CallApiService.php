<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class CallApiService
{
    public function getWeather($city) {
        // logic to make the api call
        $apikey = config('services.openweather.key');

        $apiUrl = "https://api.openweathermap.org/data/2.5/weather";

        $response = Http::get($apiUrl, [
            'q' => $city,
            'units' => 'metric',
            'appid' => $apikey
        ]);
        // http://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}

        if($response->successful()){
            return $response->json();
        }

        return [];


    }
}
