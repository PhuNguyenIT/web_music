<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
     protected $table = 'album';

    public function Song(){ 
      return $this->hasMany('App\Song', 'idSong', 'id');
    }
}
