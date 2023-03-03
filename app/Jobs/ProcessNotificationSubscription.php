<?php

namespace App\Jobs;

use App\Models\Message;
use App\Models\SubscriptionChannel;
use App\Models\User;
use App\Jobs\Notifications\NotificationEmail;
use App\Jobs\Notifications\NotificationPush;
use App\Jobs\Notifications\NotificationSMS;
use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessNotificationSubscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private Message $message;
    
    /**
     * Create a new job instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $notificationsToBeSent = Category::getSubscribedUserIdsAndChannelsByCategoryId($this->message->category_id);

        foreach ($notificationsToBeSent as $item) {
            print_r($item);
            $user = User::find($item->user_id);
            switch ($item->channel) {
                case SubscriptionChannel::SUBSCRIPTION_CHANNEL_EMAIL:
                    NotificationEmail::dispatch($this->message, $user);
                    break;
                case SubscriptionChannel::SUBSCRIPTION_CHANNEL_SMS:
                    NotificationSMS::dispatch($this->message, $user);
                    break;
                case SubscriptionChannel::SUBSCRIPTION_CHANNEL_PUSH_NOTIFICATION:
                    NotificationPush::dispatch($this->message, $user);
                    break;
            }
        }
    }
}
