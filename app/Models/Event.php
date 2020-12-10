<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'type',
        'category',
        'capacity',
        'instructor',
        'link',
        // 'register_users',
        // 'highlighted',
        // 'location'


    ];


    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'event_user', 'user_id', 'event_id');
    }
}
