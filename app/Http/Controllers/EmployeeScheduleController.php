<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class EmployeeScheduleController extends Controller
{
    public function getWorkSchedule(): JsonResponse
    {
        return new JsonResponse(['Endpoint not yet implemented.'], JsonResponse::HTTP_NOT_IMPLEMENTED);
    }
}
