<div class="w-128 mx-auto bg-gray-900 text-white text-sm rounded-lg overflow-hidden">
                <div class="current-weather relative">
                    <div class="flex items-center justify-between px-4 py-1">
                    <div class="flex items-center">
                        <div>
                            <div class="text-5xl font-semibold">{{ round($currentWeather['main']['temp'])}}&#176;C</div>
                            <div class="text-gray-400 font-semibold">Feels like {{ round($currentWeather['main']['feels_like'])}}&#176;C</div>
                        </div>
                        <div class="ml-5">
                            <div class="font-semibold">{{ ucfirst($currentWeather['weather'][0]['description'])}}</div>
                            <div class="text-gray-400">Kuressaare, Saaremaa</div>
                        </div>
                    </div>
                    <div>
                        <img src="https://openweathermap.org/img/wn/{{ $currentWeather['weather'][0]['icon'] }}@4x.png" alt="icon">
                    </div>
                    </div>
                </div>
            </div>