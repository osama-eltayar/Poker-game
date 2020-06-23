<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['suit','value'];
    public $timestamps = false ;

    public function move()
    {
        return $this->hasOne('App\GameMove');
    }
}
