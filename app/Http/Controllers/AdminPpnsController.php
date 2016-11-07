<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Ppns;
use App\Province;

class AdminPpnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppns = Ppns::paginate(15);

        return view('admin.ppns.index')
            ->with('ppns', $ppns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Province::all()->sortBy('name');
        return view('admin.ppns.create')
            ->with('provinsi', $provinsi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'province_id' => 'required',
            'name' => 'required',
            'nip' => 'required',
            'unit' => 'required',
        ]);     

        Ppns::create([
            'province_id' => $request['province_id'],
            'name' => $request['name'],
            'nip' => $request['nip'],
            'unit' => $request['unit'],
        ]);

        $url = 'ppnssearch?s=' . $request['name'];

        return redirect($url)
            ->with('message', 'PPNS baru telah dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ppns = Ppns::where('id', $id)->firstorfail();
        $provinces = Province::all();
        $provinsi = $ppns->province;
        
        return view('ppns.show')
            ->with('provinces', $provinces)
            ->with('ppns', $ppns)
            ->with('provinsi', $provinsi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ppns = Ppns::where('id', $id)->firstorfail();
        $provinsi = Province::all()->sortBy('name');
        return view('admin.ppns.edit')
            ->with('ppns', $ppns)
            ->with('provinsi', $provinsi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'province_id' => 'required',
            'name' => 'required',
            'nip' => 'required',
            'unit' => 'required',
        ]);     

        Ppns::where('id', $id)->update([
            'province_id' => $request['province_id'],
            'name' => $request['name'],
            'nip' => $request['nip'],
            'unit' => $request['unit'],
        ]);

        $url = 'admin/ppns/' . $id;

        return redirect($url)
            ->with('message', 'PPNS telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ppns::where('id', $id)->delete();

        return redirect('admin/ppns')
            ->with('message', 'Ppns telah dihapus.');
    }
}
