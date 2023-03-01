<?php

namespace App\Jobs\Notifications;

use App\Models\SubscriptionChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
class NotificationSMS extends Notification
{
    public function getNotificationChannel():string
    {
        return SubscriptionChannel::SUBSCRIPTION_CHANNEL_SMS;
    }

    public function getDestination(): mixed
    {
        return $this->user->phone_number;
    }

    public function dispatchNotification(): void
    {
        //TODO
    }
    
}
