<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pengawas;
use App\Province;

class PengawasController extends Controller
{
    public function index() {
    	$provinces = Province::all()->sortBy('name');
        $counter = Pengawas::count();
        $pengawas = Pengawas::paginate(12);
        return view('pengawas.index')
            ->with('counter', $counter)
            ->with('provinces', $provinces)
            ->with('pengawas', $pengawas);
    }

    public function show($id) {
        $pengawas = Pengawas::where('id', $id)->firstorfail();
        $provinces = Province::all()->sortBy('name');
        $provinsi = $pengawas->province;
        
        return view('pengawas.show')
            ->with('provinces', $provinces)
            ->with('pengawas', $pengawas)
            ->with('provinsi', $provinsi);
    }
}
