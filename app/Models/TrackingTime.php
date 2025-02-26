<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrackingTime extends Model
{
    use SoftDeletes;

    protected $table = 'tracking_time';

    protected $fillable = ['task_id', 'user_id', 'duration_minutes', 'date', 'description'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
