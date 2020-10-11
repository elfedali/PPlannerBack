<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'task_id',

    ];

    public function task()
    {
        return $this->belongsTo(Task::class);

    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
} 
