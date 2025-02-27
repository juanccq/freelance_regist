<?php

namespace App\Services;

use App\Models\User;
use App\Models\VwTrackingTime;
use App\Jobs\GenerateCsvAndSendEmail;

class TrackingTimeService
{

    public function sendReport()
    {

        $userId = auth()->user()->id;
        $trackingTime = VwTrackingTime::where('user_id', $userId)->get()->toArray();
        // $email = auth()->user()->email;
        $email = 'juan.c.c.q@gmail.com';

        GenerateCsvAndSendEmail::dispatch($email, $trackingTime);
    }
}
