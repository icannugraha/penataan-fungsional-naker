<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ppns;
use App\Province;

class PpnsSearchController extends Controller
{
	public function index(Request $request) {
        $provinces = Province::all()->sortBy('name');
        $search = $request->get('s');
		$ppns = Ppns::where('name','like','%'.$search.'%')
                ->orderBy('name')
                ->paginate(15)
                ->appends(['s' => $search]);
        $counter = Ppns::where('name','like','%'.$search.'%')->count();
        return view('ppnssearch')
            ->with('counter', $counter)
            ->with('search', $search)
            ->with('provinces', $provinces)
            ->with('ppns', $ppns);
    }
}
