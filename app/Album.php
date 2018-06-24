<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable=array('name','description','image_cover');
    public function photos(){
        return $this->hasMany('App\photo');
    }
}
