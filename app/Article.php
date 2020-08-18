<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function categorie()
    { // code...
      return $this->belongsTo('App\Categorie','cat_id');
    }
    public function livraisons()
    {
      // code...
      return $this->hasMany('App\Livraison');
    }
    public function details()
    {
      // code...
      return $this->hasMany('App\Details');
    }
    public function redpros()
    {
      // code...
      return $this->hasMany('App\Redpro');
    }
}
