<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // const ENABLE_PROJECT = '1';
    // const UNVERIFIED_USER = '0';

    protected $fillable = [
        'name',
        'slug',
        'user_id',
        'status'
    ];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
