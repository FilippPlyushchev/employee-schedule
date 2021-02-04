<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;
use App\Repositories\HolidaysRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class EmployeeScheduleController extends Controller
{
    /** @var EmployeeRepository */
    protected $ser;

    /**
     * EmployeeScheduleController constructor.
     *
     * @param EmployeeRepository $ser
     */
    public function __construct(EmployeeRepository $ser)
    {
        $this->ser = $ser;
    }


    public function getWorkSchedule(): JsonResponse
    {
        dd($this->ser->find(1));
        return new JsonResponse(['Endpoint not yet implemented.'], JsonResponse::HTTP_NOT_IMPLEMENTED);
    }
}
