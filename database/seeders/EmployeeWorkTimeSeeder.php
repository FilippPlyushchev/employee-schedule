<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeWorkTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_work_time')->insert([
            'employee_id' => 1,
            'start' => '10:00',
            'end' => '13:00',
        ]);

        DB::table('employee_work_time')->insert([
            'employee_id' => 1,
            'start' => '14:00',
            'end' => '19:00',
        ]);

        DB::table('employee_work_time')->insert([
            'employee_id' => 2,
            'start' => '09:00',
            'end' => '12:00',
        ]);

        DB::table('employee_work_time')->insert([
            'employee_id' => 2,
            'start' => '13:00',
            'end' => '18:00',
        ]);
    }
}
