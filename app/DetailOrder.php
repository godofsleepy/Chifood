<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    //
    protected $table = 'detail_order';
    protected $primaryKey = 'id_detail_order';
    protected $guarded = ['id_detail_order'];
}