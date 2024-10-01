<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\View\View;

class CityController extends Controller
{
    public function show(string $alias): View
    {
        $city = City::where('alias', $alias)->firstOrFail();
        session(['selected_city' => $city]);
        $cities = City::getCityFirstLetter();

        return view('index', [
            'city' => $city,
            'cities' => $cities,
        ]);
    }
}
