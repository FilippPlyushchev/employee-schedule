<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;
use App\Repositories\HolidaysRepository;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class ScheduleService
{
    /** @var EmployeeRepository */
    private EmployeeRepository $employeeRepository;

    /** @var HolidaysRepository */
    private HolidaysRepository $holidaysRepository;

    /**
     * ScheduleService constructor.
     * @param EmployeeRepository $employeeRepository
     * @param HolidaysRepository $holidaysRepository
     */
    public function __construct(EmployeeRepository $employeeRepository, HolidaysRepository $holidaysRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->holidaysRepository = $holidaysRepository;
    }

    /**
     * @param int $id
     * @param string $startDate
     * @param string $endDate
     * @return array
     */
    public function getEmployeeSchedule(int $id, string $startDate, string $endDate): array
    {
        $workTimes = $this->employeeRepository->find($id);
        $workingPeriod = $this->getWorkingPeriod($startDate, $endDate);
        $getWorkingTimeIntervals = $this->getWorkingTimeIntervals($workingPeriod, $workTimes);

        return $this->getOutputData($getWorkingTimeIntervals);
    }

    /**
     * @param string $startDate
     * @param string $endDate
     * @return CarbonPeriod
     */
    private function getWorkingPeriod(string $startDate, string $endDate): CarbonPeriod
    {
        return CarbonPeriod::create($startDate, $endDate)
            ->filter(function ($date) {
                return $date->isWeekday()
                    && $this->holidaysRepository->isDayOff($date->format('Y-m-d'));
            });
    }

    /**
     * @param CarbonPeriod $businessDaysPeriod
     * @param array $timeRanges
     * @return array
     */
    private function getWorkingTimeIntervals(CarbonPeriod $businessDaysPeriod, array $timeRanges): array
    {
        $workingTimeIntervals = [];
        foreach ($businessDaysPeriod as $date) {
            foreach ($timeRanges as $time) {
                $workingTimeIntervals[] = [
                    'start' => Carbon::create($date->format('Y-m-d') . ' ' . $time['start']),
                    'end' => Carbon::create($date->format('Y-m-d') . ' ' . $time['end'])
                ];
            }
        }

        return $workingTimeIntervals;
    }

    /**
     * @param array $workingTimeIntervals
     * @return array
     */
    private function getOutputData(array $workingTimeIntervals): array
    {
        $result = [];
        foreach ($workingTimeIntervals as $interval) {
            $key = $interval['start']->format('Y-m-d');

            $result['schedule'][$key]['day'] = $interval['start']->format('Y-m-d');
            $result['schedule'][$key]['timeRanges'][] = [
                'start' => $interval['start']->format('H:i'),
                'end' => $interval['end']->format('H:i')
            ];
        }

        return $result;
    }
}