<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

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

    public static function getUsersSubscribedToCategory($category_id)
    {
        $users = User::whereHas('subscribedCategories', function (Builder $query) use ($category_id) {
            $query->where('id', '=', $category_id);
        })->get();
        return $users;
    }
}
