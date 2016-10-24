<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function pengawas()
    {
    	return $this->hasMany('App\Pengawas');
    }
}
