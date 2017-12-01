<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    public function Song(){
      return $this->belongsTo('App\Song','idSong','id');
    }

    public function User(){
      return $this->belongsTo('App\User','idUser','id');
    }

    
}
