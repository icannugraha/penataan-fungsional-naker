<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pengawas;
use App\Province;

class SearchController extends Controller
{
	public function index(Request $request) {
        $provinces = Province::all()->sortBy('name');
        $search = $request->get('s');
		$pengawas = Pengawas::where('name','like','%'.$search.'%')
                ->orderBy('name')
                ->paginate(15)
                ->appends(['s' => $search]);
        $counter = Pengawas::where('name','like','%'.$search.'%')->count();
        return view('search')
            ->with('counter', $counter)
            ->with('search', $search)
            ->with('provinces', $provinces)
            ->with('pengawas', $pengawas);
    }
}
