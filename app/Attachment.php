<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'file',
        'comment_id',

    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
