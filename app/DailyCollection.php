<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyCollection extends Model
{
    //
    protected $fillable = ['user_id', 'rupees', 'date'];
}
