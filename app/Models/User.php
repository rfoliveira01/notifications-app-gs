<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are allowed to be updated.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
    ];


    /*
    Eloquent relationship for the subscribed categories
    */
    public function subscribedCategories()
    {
        return $this->hasMany(SubscriptionCategory::class);
    }

    /*
    Eloquent relationship for the subscribed categories
    */
    public function preferedChannels()
    {
        return $this->hasMany(SubscriptionChannel::class);
    }

    /*
    TODO: Eloquent relationship for the PushNotification subscription credentials
    */
    public function pushSubscription()
    {
        //TODO 
    }
}
