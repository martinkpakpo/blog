<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    //
    public function user()
    {
      // code...
      return $this->belongsTo('App\User','user_id');
    }
    public function details()
    {
      // code...
      return $this->hasMany(Details::class);
    }
}
