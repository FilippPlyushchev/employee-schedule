<?php

namespace App\Repositories;

use Carbon\Carbon;
use GuzzleHttp\Client;

class HolidaysRepository
{
    /** @var Client */
    private $httpClient;

    /**
     * HolidaysRepository constructor.
     *
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getAll(): array
    {
        $response = $this->httpClient->get('http://basicdata.ru/api/json/calend/')->getBody()->getContents();
        $holidaysList = json_decode($response);
        foreach ($holidaysList as $day) {
            dd($day);
            $holidays[] = Carbon::create($day);
        }
        dd($holidays);
    }
}