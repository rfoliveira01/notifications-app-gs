<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionCategory extends Model
{
    use HasFactory;

    public function user(){
        $this->hasOne(User::class);
    }
}
