<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use App\Services\CityService;
use App\External\OpenWeatherMapClient;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private CityService $cityService;
    private OpenWeatherMapClient $openWeatherMapClient;

    public function __construct(CityService $cityService, OpenWeatherMapClient $openWeatherMapClient)
    {
        $this->cityService = $cityService;
        $this->openWeatherMapClient = $openWeatherMapClient;
    }

    public function index(): View
    {
        $cities = $this->cityService->getCities();
        $location = request()->location ?? $cities[0]['id'];
        $weatherForecast = $this->openWeatherMapClient->getDailyForecast($location);

        return view('welcome', [
            'cities' => $cities,
            'forecast' => $weatherForecast,
            'selectedCity' => $location,
        ]);
    }
}
