<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorite';

    public function User(){  
      return $this->belongsTo('App\User','idUser','id' );
    }

    public function Song(){ 
      return $this->hasMany('App\Song', 'idSong', 'id');
    }
}
