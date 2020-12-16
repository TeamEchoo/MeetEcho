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
   
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'event_user', 'user_id', 'event_id');
    }

    private function getNumberOfPeople()
    {
        $users = ($this->users());
        return $users->count();
    }

    public function isAvailable()
    {
        if ($this->getNumberOfPeople() + 1 <= $this->capacity) {
            return true;
        }
        return false;
    }

    public function addUser($userId)
    {
        if ($this->isAvailable()) {
           $this->users()->attach($userId);
        }
        return;
    }

    public function removeUser($userId)
    {
        $this->users()->detach($userId);
    }
}
