<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $guarded = ['id'];

    public function ratings()
    {
        return $this->belongsTo('App\Rating', 'id', 'user_id');
    }
}
