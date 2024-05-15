<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    currentWeather: {
        required: true
    }
});

</script>

<template>
     <body class="pt-16 bg-gradient-to-tr from-blue-200 to-blue-400 min-h-screen">
    <Head title="Welcome" />

    <div class=" w-128 mx-auto bg-gray-900 text-white text-sm rounded-lg overflow-hidden">
                <div class="current-weather relative">
                    <div class="flex items-center justify-between px-4 py-1">
                    <div class="flex items-center">
                        <div>
                            <div class="text-4xl font-semibold">{{ currentWeather?.main.temp }}&#176;C</div>
                            <div class="text-gray-400 font-semibold">Feels like {{ currentWeather?.main.feels_like }}&#176;C</div>
                        </div>
                        <div class="ml-5">
                            <div class="font-semibold">{{ currentWeather?.weather[0].description }}</div>
                            <div class="text-gray-400">Kuressaare, Saaremaa</div>
                        </div>
                    </div>
                    <div>
                        <img :src="`https://openweathermap.org/img/wn/${currentWeather?.weather[0].icon}.png`" alt="icon">
                    </div>
                    </div>
                    <div class="flex justify-between px-4 py-1">
                    <div>Clouds: {{ currentWeather?.clouds.all }}%</div>
                        <div>Humidity: {{ currentWeather?.main.humidity }}%</div>
                        </div>
                </div>
            </div>
            </body>
</template>