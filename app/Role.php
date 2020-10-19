<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_MODERATOR = 'ROLE_MODERATOR'; 
    const ROLE_USER = 'ROLE_USER'; 
    
    protected $fillable = [
        'name',
    ];

}
