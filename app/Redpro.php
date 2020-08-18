<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redpro extends Model
{
    //
    public function article()
    {
      // code...
      return $this->belongsTo('App\Article','art_id');
    }
}
