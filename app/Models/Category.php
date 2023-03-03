<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function getSubscribedUserIdsAndChannelsByCategoryId($category_id){
        return DB::table('users')
            ->join('subscription_categories', 'users.id', '=', 'subscription_categories.user_id')
            ->join('subscription_channels', 'users.id', '=', 'subscription_channels.user_id')
            ->where('subscription_categories.category_id', '=', $category_id)
            ->select('users.id as user_id', 'channel')
            ->get();
    }

}
