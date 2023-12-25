<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WeatherWidget extends Component
{
    public $forecast;

    /**
     * Create a new component instance.
     */
    public function __construct($forecast)
    {
        $this->forecast = $forecast;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.weather-widget');
    }
}
