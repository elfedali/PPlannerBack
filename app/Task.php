<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    const LEVEL_URGENT = 'LEVEL_URGENT';
    const LEVEL_NOT_URGENT = 'LEVEL_NON_URGENT'; 

    
    protected $fillable = [
        'body',
        'state_id',
        'level_id',
        'project_id'
    ];
}
