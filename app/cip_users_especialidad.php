<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cip_users_especialidad extends Model
{
    protected $table = 'cip_users_especialidad';

    public $timestamps = false;
    public function getEspecialidad(){
        return $this->contact()->first(['name'])->name;
    }

    public function contact(){  
        return $this->belongsTo(cip_users::class);
    }

}
