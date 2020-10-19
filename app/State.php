<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This model represent the state of a given task, ( STATE_NOT_STARTED | STATE_STARTED | STATE_IN_PROGRESS | STATE_FINISHED | STATE_PRIORITIZED | STATE_BLOCKED )
 */
class State extends Model
{
    const STATE_NOT_STARTED = 'STATE_NOT_STARTED';
    const STATE_STARTED = 'STATE_STARTED';
    const STATE_IN_PROGRESS = 'STATE_IN_PROGRESS';
    const STATE_FINISHED = 'STATE_FINISHED';
    const STATE_PRIORITIZED = 'STATE_PRIORITIZED';
    const STATE_BLOCKED = 'STATE_BLOCKED';


  
    
    protected $fillable = [
        'name',
    ];
  
}
