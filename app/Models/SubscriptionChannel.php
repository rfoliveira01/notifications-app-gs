<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionChannel extends Model
{
    use HasFactory;

    const SUBSCRIPTION_CHANNEL_SMS = 'SMS';
    const SUBSCRIPTION_CHANNEL_EMAIL = 'Email';
    const SUBSCRIPTION_CHANNEL_PUSH_NOTIFICATION = 'Push Notification';

    const SUBSCRIPTION_CHANNELS = [
        self::SUBSCRIPTION_CHANNEL_SMS,
        self::SUBSCRIPTION_CHANNEL_EMAIL,
        self::SUBSCRIPTION_CHANNEL_PUSH_NOTIFICATION
    ];
}
