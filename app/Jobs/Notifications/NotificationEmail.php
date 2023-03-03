<?php

namespace App\Jobs\Notifications;

use App\Models\SubscriptionChannel;
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
