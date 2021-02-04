<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkTime extends Model
{
    /** @var array  */
    protected $fillable = [
        'start',
        'end'
    ];
}