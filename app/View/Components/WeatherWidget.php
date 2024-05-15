<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class WeatherWidget extends Component
{

    public $currentWeather;
    /**
     * Create a new component instance.
     */
    public function __construct($currentWeather)
    {
        $this->currentWeather = $currentWeather;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        dd($this->currentWeather);
        return view('components.weather-widget');
    }
}
