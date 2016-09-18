<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pengawas;
use App\Province;

class PengawasController extends Controller
{
    public function index($id) {
    	$pengawas = Pengawas::where('id', $id)->firstorfail();
    	$provinces = Province::all();
    	$provinsi = $pengawas->province;
    	
    	return view('pengawas')
    		->with('provinces', $provinces)
    		->with('pengawas', $pengawas)
    		->with('provinsi', $provinsi);
    }
}
