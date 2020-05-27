<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    //

    public function member(){
      return $this->belongso('App\Models\Member');
    }
}
