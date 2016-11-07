<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Province;
use App\Pengawas;

class ProvinsiController extends Controller
{
	public function index($id) {
		$provinces = Province::all()->sortBy('name');
		$provinsi = Province::where('id', $id)->firstorfail();
		$counter = Pengawas::where('province_id', $id)->count();

		$pengawas = Pengawas::where('province_id', $id)->paginate(15);


		return view('provinsi')
			->with('counter', $counter)
			->with('provinsi', $provinsi)
			->with('provinces', $provinces)
			->with('pengawas', $pengawas);		
	}

}
