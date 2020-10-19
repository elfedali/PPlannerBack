<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // const ENABLE_PROJECT = '1';
    // const UNVERIFIED_USER = '0';
    use Sluggable;


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name', 'id']
            ]
        ];
    }

    protected $fillable = [
        'name',
        'slug',
        'user_id',
        'workspace_id',
        
    ];


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
