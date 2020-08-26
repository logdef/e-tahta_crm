<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessonspackageproducts extends Model
{
    protected $fillable  = ['package_id','lessons_package_name','lessons_package_price','lassign_id','lessons_package_code'];
}
