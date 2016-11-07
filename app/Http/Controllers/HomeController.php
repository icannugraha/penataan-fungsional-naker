<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Province;
use App\Pengawas;
use App\Ppns;
use App\User;

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
    public function index(Request $request)
    {
        $order = $request ? $request->get('sort') : 'asc';
        $provinces = Province::where('name', '<>', 'PUSAT')
            ->orderBy('name', $order)
            ->paginate(12)
            ->appends(['sort' => $order]);
        $jumlahuser = User::count();
        $jumlahppns = Ppns::count();
        $jumlahprovinsi = Province::where('name', '<>', 'PUSAT')->count();
        $jumlahpengawas = Pengawas::count();
        return view('welcome')
            ->with('jumlahuser', $jumlahuser)
            ->with('jumlahppns', $jumlahppns)
            ->with('jumlahpengawas', $jumlahpengawas)
            ->with('jumlahprovinsi', $jumlahprovinsi)
            ->with('provinces', $provinces);
    }
}
