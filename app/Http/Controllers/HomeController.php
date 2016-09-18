<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Province;
use App\Pengawas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        $counter = Pengawas::count();
        $pengawas = Pengawas::paginate(15);
        return view('welcome')
            ->with('counter', $counter)
            ->with('provinces', $provinces)
            ->with('pengawas', $pengawas);
    }
}
