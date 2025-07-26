<?php

namespace App\Services;

use App\Mail\NewContentNotification;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    public function notifySubscribers($content, $type)
    {
        $subscribers = Subscriber::where('is_active', 1)->get();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(
                new NewContentNotification($content, $type, $subscriber)
            );
        }
    }
}
