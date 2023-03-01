<?php

namespace App\Jobs\Notifications;

use App\Models\Message;
use App\Models\NotificationLog;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

abstract class Notification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    use Queueable;
    protected Message $message;
    protected User $user;

    public function __construct(Message $message, User $user)
    {
        $this->message = $message;
        $this->user = $user;
    }
    
    public abstract function getDestination();
    
    public abstract function getNotificationChannel():string;
    
    public abstract function dispatchNotification():void;

    public function getNotificationBody(){
        return $this->message->message;
    }

    public function handle()
    {
        $this->dispatchNotification();
        NotificationLog::logNotification($this->message->id, $this->user->id, $this->getNotificationChannel());
    }
}
