<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CallApiService;

class WeatherController extends Controller
{
    private CallApiService $apiService;

    public function __construct(CallApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $city = $request->query('city', ''); // Default to an empty string
        $weatherData = []; // Initialize as an empty array
        $error = null; // Initialize as null

        // Check if the city is provided
        // and if it's not empty
        if (!empty($city)) {
            try {

                $weatherData = $this->apiService->getWeather($city);
                // dd($weatherData);
                if (empty($weatherData)) {
                    $error = 'City not found or API error.';
                }
            } catch (\Exception $e) {
                $error = 'Error fetching weather data: ' . $e->getMessage();
            }
        }
        return view('weather', [
            'city' => $city,
            'weatherData' => $weatherData,
            'error' => $error,
        ]);
    }
}
