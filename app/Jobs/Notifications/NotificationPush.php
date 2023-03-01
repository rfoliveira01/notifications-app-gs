<?php

namespace App\Jobs\Notifications;

use App\Models\SubscriptionChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
class NotificationPush extends Notification
{
    public function getNotificationChannel():string
    {
        return SubscriptionChannel::SUBSCRIPTION_CHANNEL_PUSH_NOTIFICATION;
    }

    public function getDestination(): mixed
    {
        return $this->user->pushSubscription();
    }

    public function dispatchNotification(): void
    {
        //TODO
    }
}
