<?php

namespace App\Repositories;

use App\Models\EmployeeWorkTimes;

class EmployeeRepository
{
    /** @var EmployeeWorkTimes */
    private EmployeeWorkTimes $employeeWorkTimes;

    /**
     * HolidaysRepository constructor.
     *
     * @param EmployeeWorkTimes $employeeWorkTimes
     */
    public function __construct(EmployeeWorkTimes $employeeWorkTimes)
    {
        $this->employeeWorkTimes = $employeeWorkTimes;
    }

    /**
     * @param $id
     * @return array
     */
    public function find($id): array
    {
        return $this->employeeWorkTimes->select(['start', 'end'])
            ->where('employee_id', $id)
            ->orderBy('start', 'asc')
            ->get()
            ->toArray();
    }
}