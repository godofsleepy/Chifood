<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $table = 'food';
    protected $primaryKey = 'id_food';
    protected $guarded = ['id_food'];
}
