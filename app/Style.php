<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $table = 'style';  

    public function Song(){
    	return $this->hasMany('App\Song','idStyle','id');
    }
}
