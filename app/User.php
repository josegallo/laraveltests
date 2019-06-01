<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //one to one relationship
    public function post(){
        return $this->hasOne('App\Post'); //user_id by default as it is in migration ->hasMany('App\Post','user_id')
    }

    //one to many relationship
    public function posts(){
        return $this->hasMany('App\Post'); //user_id by default as it is in migration ->hasMany('App\Post','user_id')
    }

    //one to many relationship  
    public function showPostsOfUser(){
        return $this->hasMany('App\Post');
    }

    //many to many relationship (pivot table role_user)
    public function roles(){
        return $this->belongsToMany('App\Role');
        //to costumize tables name and columns follow the format bellow
        // return $this->belongsToMany('App\Role', 'role_user','user_id', 'role_id'); // (model to relate, pivot table, foreignkey of role, foreginkey of user)
    }

    //polymorphic relationship
    public function showPhotosPerUser (){
        return $this->morphMany('App\Photo','imageable');
    }
}
