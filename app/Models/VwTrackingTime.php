<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VwTrackingTime extends Model
{
    protected $table = 'vw_tracking_time';

    public static $searchableFields = [
        'task',
        'project',
        'date',
        'duration_minutes'
    ];
}
