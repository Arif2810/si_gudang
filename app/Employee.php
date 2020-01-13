<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model{

  	protected $primaryKey = 'id_karyawan';
	protected $guarded  = ['created_at', 'updated_at'];

}
