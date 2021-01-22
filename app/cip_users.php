<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cip_users extends Model
{
    public $timestamps = false;

    public function course(){
        return $this->belongsTo('App\cip_users_especialidad', 'codigoCIP');
    }
  
}
