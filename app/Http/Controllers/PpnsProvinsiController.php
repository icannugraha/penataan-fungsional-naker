<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Province;
use App\Ppns;

class PpnsProvinsiController extends Controller
{
	public function index($id) {
		$provinces = Province::all()->sortBy('name');
		$provinsi = Province::where('id', $id)->firstorfail();
		$counter = Ppns::where('province_id', $id)->count();

		$ppns = Ppns::where('province_id', $id)->paginate(15);


		return view('ppnsprovinsi')
			->with('counter', $counter)
			->with('provinsi', $provinsi)
			->with('provinces', $provinces)
			->with('ppns', $ppns);		
	}

}
