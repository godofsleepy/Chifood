<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public function getTransaction()
    {
    }

    protected $table = 'transaction';
    protected $primaryKey = 'id_transaction';
    protected $guarded = ['id_transaction'];

    public function detailorder()
    {
        return $this->hasMany('App\DetailOrder', 'id_order', 'id_order')->with('food');
    }
}
