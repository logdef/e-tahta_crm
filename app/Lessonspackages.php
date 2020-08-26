<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessonspackages extends Model
{
    protected $fillable  = ['users_id','package_name','package_content','package_code','package_price','lessons_package_code'];
}
