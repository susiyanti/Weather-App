<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CityService
{
    private array|null $cities;

    public function __construct()
    {
        try {
            $this->cities = Storage::json("cities_id.json");
        } catch (Exception $e) {
            Log::error('Can not load cities ' . $e->getMessage());
            $this->cities = null;
        }
    }

    public function getCities(): array|null
    {
        return $this->cities;
    }
}
