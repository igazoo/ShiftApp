<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    //

    public function user(){
      return $this->belongTo('App\User');
    }

    public function money(){
      return $this->belongsTo('App\Models\Money');
    }

}
