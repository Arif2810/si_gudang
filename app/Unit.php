<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model{
	
    protected $primaryKey = 'id_unit';
	protected $guarded  = ['created_at', 'updated_at'];
}
