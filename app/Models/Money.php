<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    //
    public function shifts(){
      return $this->hasMany('App\Models\Shift');
    }

    public function members(){
      return $this->hasMany('App\Models\Members');
    }
}
