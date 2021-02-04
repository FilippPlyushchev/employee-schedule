<?php

namespace App\Repositories;

use App\Models\EmployeeWorkTime;

class EmployeeRepository
{
    /** @var EmployeeWorkTime */
    private $employeeWorkTime;

    /**
     * HolidaysRepository constructor.
     *
     * @param EmployeeWorkTime $employeeWorkTime
     */
    public function __construct(EmployeeWorkTime $employeeWorkTime)
    {
        $this->employeeWorkTime = $employeeWorkTime;
    }

    public function find($id): array
    {
        return $this->employeeWorkTime->select('start', 'end')
            ->where('employee_id', $id)
            ->orderBy('start', 'asc')
            ->get()
            ->toArray();
    }
}