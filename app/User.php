<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

        protected  $table = "users";
        protected  $primaryKey = "id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'id',
        'username',
        //'email',
        'password',
        //??? remember_token,

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'id' => 'integer',
        'email' => 'string',
        'password' => 'string',
        'isAdmin' => 'boolean',
        'remember_token' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $dates =[
        'created_at',
        'updated_at',
    ];

    public function ads(){
        return $this->hasMany('App\Ad');
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

  public function setRememberToken($token)
    {
        // Set the remember token your own way...

        $this->remember_token = $token;
        $this->save();
       // $this->username = $token;
        //dd($this->remember_token);
    }


}
