<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $table = 'singer';  

   	public function Song(){
   		return $this->hasMany('App\Song','idSinger','id');
   	}
}
