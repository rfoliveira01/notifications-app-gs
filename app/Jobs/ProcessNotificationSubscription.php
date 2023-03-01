<?php

namespace App\Jobs;

use App\Models\Message;
use App\Models\SubscriptionChannel;
use App\Models\User;
use App\Jobs\Notifications\NotificationEmail;
use App\Jobs\Notifications\NotificationPush;
use App\Jobs\Notifications\NotificationSMS;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Ramsey\Collection\Exception\UnsupportedOperationException;

use function GuzzleHttp\default_ca_bundle;

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

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::getUsersSubscribedToCategory($this->message->category_id);
        foreach ($users as $user) {
            foreach ($user->preferedChannels as $channel) {
                switch ($channel->channel) {
                    case SubscriptionChannel::SUBSCRIPTION_CHANNEL_EMAIL:
                        NotificationEmail::dispatch($this->message, $user);
                        break;
                    case SubscriptionChannel::SUBSCRIPTION_CHANNEL_SMS:
                        NotificationSMS::dispatch($this->message, $user);
                        break;
                    case SubscriptionChannel::SUBSCRIPTION_CHANNEL_PUSH_NOTIFICATION:
                        NotificationPush::dispatch($this->message, $user);
                        break;
                    default:
                        throw new UnsupportedOperationException("Invalid Notification Channel");
                }
            }
        }
    }
}
