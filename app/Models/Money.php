<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    //
    public function shifts(){
      return $table->hasMany('App\Models\Shift');
    }

    public function users(){
      return $table->hasMany('App\User');
    }
}
