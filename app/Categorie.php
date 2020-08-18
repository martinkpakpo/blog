<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
    public function article()
    {
      // code...
      return $this->hasMany(Produit::class);
    }
}
