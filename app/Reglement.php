<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    //
    public function vente()
    {
      // code...
      return $this->belongsTo('App\Vente','vente_id');
    }
    public function mode()
    {
      // code...
      return $this->belongsTo('App\Mode','mode_id');
    }
    public function user()
    {
      // code...
      return $this->belongsTo('App\User','user_id');
    }
    
}
