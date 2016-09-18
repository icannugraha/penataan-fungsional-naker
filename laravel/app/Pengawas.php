<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengawas extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'pengawas';

    protected $fillable = [
        'province_id',
		'name',
		'ttl',
		'nip',
		'karpeg',
		'gender',
		'agama',
		'pendidikan',
		'golongan',
		'tmt',
		'jabatan',
		'sertifikasi',
		'unit',
		'gaji',
		'keterangan',
    ];

    public function province()
    {
        return $this->belongsTo('App\Province');
    }
}
