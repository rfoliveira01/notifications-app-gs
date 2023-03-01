<?php

namespace App\Jobs\Notifications;

use App\Models\SubscriptionChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
class NotificationEmail extends Notification
{
    public function getNotificationChannel():string
    {
        return SubscriptionChannel::SUBSCRIPTION_CHANNEL_EMAIL;
    }

    public function getDestination(): mixed
    {
        return $this->user->email;
    }

    public function dispatchNotification(): void
    {
        //TODO
    }
    
}
