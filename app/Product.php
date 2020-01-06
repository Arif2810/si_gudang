<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id_produk';
	protected $guarded  = ['created_at', 'updated_at'];

	public function categories(){

        return $this->belongsTo('App\Category', 'id_kategori');
    }

    public function units(){

        return $this->belongsTo('App\Unit', 'id_unit');
    }

    public function suppliers(){

        return $this->belongsTo('App\Supplier', 'id_supplier');
    }
}
