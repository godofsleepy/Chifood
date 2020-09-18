<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    //
    protected $table = 'detail_order';
    protected $primaryKey = 'id_detail_order';
    protected $guarded = ['id_detail_order'];

    public function food()
    {
        return $this->hasOne('App\Food' ,'id_food', 'id_food');
    }

    public function trasaction()
    {
        return $this->belongsTo('App\Transaction');
    }
}
