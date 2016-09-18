@extends('layouts.app')

@section('title')
    Edit
    @if ($pengawas)
        {{ $pengawas->name }}
    @endif
     - Penataan Fungsional Pengawas Ketenagakerjaan
@endsection

@section('content')
    @if (session('notice'))
        @include(session('notice'))
    @endif 
    
    @if (Auth::guest() && Auth::user())
        @include('auth.layouts.login')
    @else

    <h2><strong>Edit Pengawas</strong></h2>
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Pengawas - <em>{{ $pengawas->name }}</em> 
        </div>
        <div class="panel-body">
            <form action="{{ url('admin/pengawas') }}/{{ $pengawas->id }}" method="post">
            <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('province_id') ? ' has-error' : '' }}">
                        <label for="province_id" class="control-label">Provinsi:</label>
                        <select class="form-control" name="province_id" id="role">
                            @foreach ($provinsi as $data)
                                @if ($pengawas->province->id == $data->id)
                                <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                                @else
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('province_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('province_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Nama Pengawas:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama pengawas" value="{{ $pengawas->name }}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('ttl') ? ' has-error' : '' }}">
                        <label for="ttl" class="control-label">Tempat, Tanggal Lahir:</label>
                        <input type="text" name="ttl" class="form-control" id="ttl" placeholder="Tempat, Tanggal Lahir" value="{{ $pengawas->ttl }}">
                        @if ($errors->has('ttl'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ttl') }}</strong>
                            </span>
                        @else
                            <span class="help-block small">Contoh: <em>Jakarta, 12 Januari 1980</em></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label for="gender" class="control-label">Jenis Kelamin:</label>
                        <select class="form-control" name="gender" id="role">
                            <option value="L">Laki-laki</option>
                            <option value="P">Peempuan</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                        <label for="agama" class="control-label">Agama:</label>
                        <input type="text" name="agama" class="form-control" id="agama" placeholder="Agama" value="{{ $pengawas->agama }}">
                        @if ($errors->has('agama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('agama') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                        <label for="pendidikan" class="control-label">Pendidikan:</label>
                        <input type="text" name="pendidikan" class="form-control" id="pendidikan" placeholder="Pendidikan" value="{{ $pengawas->pendidikan }}">
                        @if ($errors->has('pendidikan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pendidikan') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                        <label for="nip" class="control-label">Nip:</label>
                        <input type="text" name="nip" class="form-control" id="nip" placeholder="Nip" value="{{ $pengawas->nip }}">
                        @if ($errors->has('nip'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nip') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('karpeg') ? ' has-error' : '' }}">
                        <label for="karpeg" class="control-label">Kartu Pegawai:</label>
                        <input type="text" name="karpeg" class="form-control" id="karpeg" placeholder="Kartu Pegawai" value="{{ $pengawas->karpeg }}">
                        @if ($errors->has('karpeg'))
                            <span class="help-block">
                                <strong>{{ $errors->first('karpeg') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('golongan') ? ' has-error' : '' }}">
                        <label for="golongan" class="control-label">Golongan:</label>
                        <input type="text" name="golongan" class="form-control" id="golongan" placeholder="Golongan" value="{{ $pengawas->golongan }}">
                        @if ($errors->has('golongan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('golongan') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                        <label for="keterangan" class="control-label">Keterangan:</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan" value="{{ $pengawas->keterangan }}">
                        @if ($errors->has('keterangan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('keterangan') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('tmt') ? ' has-error' : '' }}">
                        <label for="tmt" class="control-label">TMT:</label>
                        <input type="text" name="tmt" class="form-control" id="tmt" placeholder="TMT" value="{{ $pengawas->tmt }}">
                        @if ($errors->has('tmt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tmt') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                        <label for="jabatan" class="control-label">Jabatan:</label>
                        <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" value="{{ $pengawas->jabatan }}">
                        @if ($errors->has('jabatan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jabatan') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('sertifikasi') ? ' has-error' : '' }}">
                        <label for="sertifikasi" class="control-label">Sertifikasi:</label>
                        <input type="text" name="sertifikasi" class="form-control" id="sertifikasi" placeholder="Sertifikasi" value="{{ $pengawas->sertifikasi }}">
                        @if ($errors->has('sertifikasi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sertifikasi') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                        <label for="unit" class="control-label">Unit:</label>
                        <input type="text" name="unit" class="form-control" id="unit" placeholder="Unit" value="{{ $pengawas->unit }}">
                        @if ($errors->has('unit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('unit') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('gaji') ? ' has-error' : '' }}">
                        <label for="gaji" class="control-label">Gaji:</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="text" name="gaji" class="form-control" id="gaji" placeholder="Gaji" value="{{ $pengawas->gaji }}">
                        </div>
                        
                        @if ($errors->has('gaji'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gaji') }}</strong>
                            </span>
                        @else
                            <span class="help-block small">Contoh: <em>2500000</em> | Tanpa titik atau koma.</span>
                        @endif
                    </div>
                </div>
        </div>
        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-primary">Update Pengawas</button>
        </div>
        </form>
        </div>
    </div>
        
    @endif

@endsection
