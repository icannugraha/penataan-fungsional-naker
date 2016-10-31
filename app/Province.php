<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function pengawas()
    {
    	return $this->hasMany('App\Pengawas');
    }

    public function ppns()
    {
    	return $this->hasMany('App\Ppns');
    }
}
