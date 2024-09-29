<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\CityParserService;
use Illuminate\Console\Command;

class ParseCitiesCommand extends Command
{
    protected $signature = 'parse:cities';
    protected $description = 'Парсинг городов России через API hh.ru';

    protected CityParserService $parserService;

    public function __construct(CityParserService $parserService)
    {
        parent::__construct();
        $this->parserService = $parserService;
    }

    public function handle(): void
    {
        $this->parserService->parseCities();
        $this->info('Города успешно загружены в базу данных.');
    }
}
