<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    //

    public function member(){
      return $this->belongTo('App\Models\Member');
    }

    public function money(){
      return $this->belongsTo('App\Models\Money');
    }

}
