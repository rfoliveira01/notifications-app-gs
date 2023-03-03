<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'updated_at',
    ];

    /**
     * The relationships that will be loaded on serialization
     *
     * @var array<int, string>
     */
    protected $with = [
        'category'
    ];

    /**
     * The attributes that are allowed to be updated.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
