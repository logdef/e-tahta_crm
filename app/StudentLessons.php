<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentLessons extends Model
{
    public function comments()
    {
        return $this->hasMany('App\StudentLessons');
    }
}
