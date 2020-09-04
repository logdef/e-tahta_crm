<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Support\Facades\DB;

class Lessons extends Model
{
    //

    public function lesson(){

        return $this->hasMany('App\Lassign','lessons_id', 'id');
    }


}
