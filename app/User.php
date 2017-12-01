<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    public function Comment(){
        return $this->hasMany('App\Comment','idUser','id'); //idUser: khóa ngoại bảng trỏ tới, id: khóa chính bảng đang đứng
    }

    public function Favorite(){
        return $this->hasMany('App\Favorite','idUser','id');
    }

    public function Song(){  //lấy hết all song trong favorite
        return $this->hasManyThrough('App\Song', 'App\Favorite','idUser','idSong', 'id');
  }
}
