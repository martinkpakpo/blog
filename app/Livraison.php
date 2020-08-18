<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    //
    public function articles()
    {
      // code...
      return $this->belongsTo('App\Article','art_id');
    }
    public function gr()
    {
      // code...
      return $this->belongsTo('App\GrLivraison','Gr_id');
    }
}
