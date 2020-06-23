<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameMove extends Model
{
    protected $fillable = ['card_id'];

    public function card()
    {
        return $this->belongsTo('App\Card');
    }
}
