<?php

namespace App\Http\Controllers;

use App\Services\ScheduleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployeeScheduleController extends Controller
{
    /** @var ScheduleService */
    protected ScheduleService $scheduleService;

    /**
     * EmployeeScheduleController constructor.
     * @param ScheduleService $scheduleService
     */
    public function __construct(ScheduleService $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getWorkSchedule(Request $request): JsonResponse
    {
        $data = $this->scheduleService->getEmployeeSchedule($request->employeeId, $request->startDate, $request->endDate);

        return response()->json($data);
    }
}
