<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\View\View;

class SiteController extends Controller
{
    public function index(): View
    {
        $cities = City::getCityFirstLetter();
        $selectedCity = session('selected_city');

        return view('index', [
            'cities' => $cities,
            'selectedCity' => $selectedCity,
        ]);
    }

    public function news(string $alias = null): View
    {
        if ($alias) {
            $city = City::where('alias', $alias)->firstOrFail();
            session(['selected_city' => $city]);

            return view('news', [
                'city' => $city
            ]);
        }

        return view('news');
    }

    public function about(string $alias = null): View
    {
        if ($alias) {
            $city = City::where('alias', $alias)->firstOrFail();
            session(['selected_city' => $city]);

            return view('about', [
                'city' => $city
            ]);
        }

        return view('about');
    }
}
