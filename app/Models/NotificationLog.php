<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class NotificationLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are allowed to be updated.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message_id',
        'user_id',
        'channel'
    ];

    /**
     * The relationships that will be loaded on serialization
     *
     * @var array<int, string>
     */
    protected $with = [
        'message',
        'user'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     * 
     * @throws InvalidArgumentException
     */
    protected $hidden = [
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public static function logNotification($message_id, $user_id, $channel)
    {
        if (!in_array($channel, SubscriptionChannel::SUBSCRIPTION_CHANNELS)) {
            throw new InvalidArgumentException("Invalid notification channel");
        }

        $log = new NotificationLog([
            'message_id' => $message_id,
            'user_id' => $user_id,
            'channel' => $channel
        ]);

        $log->save();

        return $log;
    }
}
