<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'region', 'alias'];

    public static function getCityFirstLetter(): Collection
    {
        $cities = City::select('name', 'alias')->orderBy('name')->get()->groupBy(function ($city) {
            return mb_substr($city->name, 0, 1);
        });

        return $cities;
    }
}
