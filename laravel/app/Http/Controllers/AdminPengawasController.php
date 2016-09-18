<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pengawas;
use App\Province;

class AdminPengawasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengawas = Pengawas::paginate(15);

        return view('admin.pengawas.index')
            ->with('pengawas', $pengawas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Province::all();
        return view('admin.pengawas.create')
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
            'ttl' => 'required',
            'nip' => 'required',
            'karpeg' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'golongan' => 'required',
            'tmt' => 'required',
            'jabatan' => 'required',
            'sertifikasi' => 'required',
            'unit' => 'required',
            'gaji' => 'required',
            'keterangan' => 'required',
        ]);     

        Pengawas::create([
            'province_id' => $request['province_id'],
            'name' => $request['name'],
            'ttl' => $request['ttl'],
            'nip' => $request['nip'],
            'karpeg' => $request['karpeg'],
            'gender' => $request['gender'],
            'agama' => $request['agama'],
            'pendidikan' => $request['pendidikan'],
            'golongan' => $request['golongan'],
            'tmt' => $request['tmt'],
            'jabatan' => $request['jabatan'],
            'sertifikasi' => $request['sertifikasi'],
            'unit' => $request['unit'],
            'gaji' => $request['gaji'],
            'keterangan' => $request['keterangan'],
        ]);

        return redirect('admin/pengawas')
            ->with('message', 'Pengawas baru telah dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengawas = Pengawas::where('id', $id)->firstorfail();

        return view('admin.pengawas.show')
            ->with('pengawas', $pengawas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengawas = Pengawas::where('id', $id)->firstorfail();
        $provinsi = Province::all();
        return view('admin.pengawas.edit')
            ->with('pengawas', $pengawas)
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
            'ttl' => 'required',
            'nip' => 'required',
            'karpeg' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'golongan' => 'required',
            'tmt' => 'required',
            'jabatan' => 'required',
            'sertifikasi' => 'required',
            'unit' => 'required',
            'gaji' => 'required',
            'keterangan' => 'required',
        ]);     

        Pengawas::where('id', $id)->update([
            'province_id' => $request['province_id'],
            'name' => $request['name'],
            'ttl' => $request['ttl'],
            'nip' => $request['nip'],
            'karpeg' => $request['karpeg'],
            'gender' => $request['gender'],
            'agama' => $request['agama'],
            'pendidikan' => $request['pendidikan'],
            'golongan' => $request['golongan'],
            'tmt' => $request['tmt'],
            'jabatan' => $request['jabatan'],
            'sertifikasi' => $request['sertifikasi'],
            'unit' => $request['unit'],
            'gaji' => $request['gaji'],
            'keterangan' => $request['keterangan'],
        ]);

        $url = 'admin/pengawas/' . $id;

        return redirect($url)
            ->with('message', 'Pengawas telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengawas::where('id', $id)->delete();

        return redirect('admin/pengawas')
            ->with('message', 'Pengawas telah dihapus.');
    }
}
