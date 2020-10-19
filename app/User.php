<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const GENDER_FEMALE = 'F';
    const GENDER_MALE = 'M';
    const GENDER_UNKNOWN = 'NAN';

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'verified',
        'gender',
        'verification_token',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function workspaces()
    {
        return $this->hasMany(Workspace::class);
    }
    /**
     * strtolower $name attribute
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower($name);
    }

    /**
     * ucfirst $name
     */
    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }

    /**
     * strtolower $email attribute
     */
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }

    /**
     * get $email
     */
    public function getEmailAttribute($email)
    {
        return $email;
    }
    /**
     * is user verified 
     * @return boolean true|false
     */
    public function isVerified()
    {
        return $this->verified == User::VERIFIED_USER;
    }
    /**
     * is this user is admin
     * @return boolean true|false
     */
    public function isAdmin()
    {
        return $this->admin == User::ADMIN_USER;
    }
    public static function generateVerificationCode()
    {
        return  \Illuminate\Support\Str::random(40);
    }


}
