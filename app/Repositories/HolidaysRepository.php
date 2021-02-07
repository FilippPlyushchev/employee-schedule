<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class HolidaysRepository
{
    const WORKING_DAY = 0;

    /** @var Client */
    private Client $httpClient;

    /**
     * HolidaysRepository constructor.
     *
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $date
     * @return bool
     * @throws GuzzleException
     */
    public function isDayOff(string $date): bool
    {
        $response = $this->httpClient->get("https://isdayoff.ru/{$date}")->getBody()->getContents();
        $statusDay = json_decode($response);

        if ($statusDay === self::WORKING_DAY) {
            return true;
        }

        return false;
    }
}