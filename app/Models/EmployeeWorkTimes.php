<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\EmployeeWorkTimes
 *
 * @property int $id
 * @property string $start
 * @property string $end
 * @property int $employee_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkTimes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkTimes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkTimes query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkTimes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkTimes whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkTimes whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkTimes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkTimes whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkTimes whereUpdatedAt($value)
 * @mixin Eloquent
 */
class EmployeeWorkTimes extends Model
{
    /** @var array */
    protected array $fillable = [
        'start',
        'end'
    ];

    /** @var array */
    protected array $hidden = [
        'created_at',
        'updated_at',
    ];
}