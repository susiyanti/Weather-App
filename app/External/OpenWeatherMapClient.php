<?php

namespace App\External;

use Illuminate\Support\Facades\Http;

use App\Exceptions\WeatherException;

class OpenWeatherMapClient
{

    private String $api_key;
    private String $url = 'https://api.openweathermap.org/';

    private array $units = [
        'c' => 'metric',
        'f' => 'imperial',
        'k' => 'standard',
    ];

    public function __construct()
    {
        $this->api_key = config('services.openweathermap.key');
    }

    private function buildQueryString(array $params)
    {
        $params['appid'] = $this->api_key;
        $params['units'] = $this->units['c'];

        return http_build_query($params);
    }

    private function fetch($route, $params = [])
    {
        $route = $this->url . $route . "?" . $this->buildQueryString($params);
        $response = Http::get($route);
        if ($response->ok()) {
            return $response->json()['list'];
        } else if ($response->notFound()) {
            return [];
        } else {
            throw new WeatherException($response->json()['message']);
        }
    }

    public function getDailyForecast($cityId)
    {
        $params = [
            'cnt' => 5,
            'id' => $cityId,
        ];
        return $this->fetch("data/2.5/forecast/daily", $params);
    }
}
