<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    public function Shifts(){
      return $this->hasMany('App\Models\Shift');
    }

  
}
