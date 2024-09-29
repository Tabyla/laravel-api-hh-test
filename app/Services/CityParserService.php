<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\City;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CityParserService
{
    protected string $apiUrl = 'https://api.hh.ru/areas';

    public function parseCities(): void
    {
        $response = Http::get($this->apiUrl);
        $data = $response->json();

        foreach ($data as $country) {
            if ($country['name'] === 'Россия') {
                foreach ($country['areas'] as $region) {
                    foreach ($region['areas'] as $city) {
                        City::updateOrCreate(
                            ['name' => $city['name']],
                            [
                                'region' => $region['name'],
                                'alias' => $this->generateSlug($city['name'], $region['name']),
                            ]
                        );
                    }
                }
            }
        }
    }

    public function generateSlug(string $name, string $region): string
    {
        $slug = Str::slug($name);
        $existingCount = City::where('alias', $slug)->count();

        return $existingCount > 0 ? "{$slug}-{$region}" : $slug;
    }
}
