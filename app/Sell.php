<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model{

    protected $primaryKey = 'id_sell';
	protected $guarded  = ['created_at', 'updated_at'];

	public function employees(){

        return $this->belongsTo('App\Employee', 'id_karyawan');
    }

    public function products(){

        return $this->belongsTo('App\Product', 'id_produk');
    }
}
