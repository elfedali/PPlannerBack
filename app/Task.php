<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'body',
        'state_id',
        'level_id',
        'project_id'
    ];
}
