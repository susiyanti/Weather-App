<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use App\Services\CityService;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private CityService $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function index(): View
    {
        $cities = $this->cityService->getCities();

        return view('welcome', [
            'cities' => $cities,
        ]);
    }
}
