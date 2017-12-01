<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'song';  

    public function Style(){
        return $this->belongsTo('App\Style','idStyle', 'id');
    }

    public function Album(){
        return $this->belongsTo('App\Album','idAlbum', 'id');
    }

    public function Singer(){
        return $this->belongsTo('App\Singer','idSinger','id');
    }

    public function Comment(){
        return $this->hasMany('App\Comment','idSong','id');
    }


}
