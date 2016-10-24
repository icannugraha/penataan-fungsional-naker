<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppns extends Model
{
    /**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'ppns';

    protected $fillable = [
        'province_id',
		'name',
		'nip',
		'unit',
    ];

    public function province() 
    {
    	return $this->belongsTo('App\Province');
    }

}
