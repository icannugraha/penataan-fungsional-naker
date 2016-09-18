@extends('layouts.app')

@section('title')
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
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Sukses!</strong> {!! session('message') !!}
        </div>  
        @endif

        <h2><strong>Detail Pengawas</strong></h2>
       
        <hr>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <strong>{{ $pengawas->name }}</strong>
            </div>

            <div class="panel-footer text-right">
                <form action="/admin/pengawas/{{ $pengawas->id }}" method="post" id="deleteform">
                {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                </form>
                <a href="/admin/pengawas/{{ $pengawas->id }}/edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                <button class="btn btn-danger" id="delete"<i class="fa fa-trash-o"></i> Delete</button>
            </div>

            @if ($pengawas)
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>Provinsi :</dt>
                    <dd>{{ $pengawas->province->name }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <dl class="dl-horizontal">
                            <dt>Nama :</dt>
                            <dd>{{ $pengawas->name }}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Tempat, Tanggal Lahir :</dt>
                            <dd>{{ $pengawas->ttl }}</dd>
                        </dl>    
                        <dl class="dl-horizontal">
                            <dt>Jenis Kelamin :</dt>
                            <dd>
                            @if($pengawas->gender = 'L')
                                Laki-laki
                            @else
                                Perempuan
                            @endif
                            </dd>
                        </dl>    
                        <dl class="dl-horizontal">
                            <dt>Agama :</dt>
                            <dd>{{ $pengawas->agama }}</dd>
                        </dl>                        
                        <dl class="dl-horizontal">
                            <dt>Pendidikan :</dt>
                            <dd>{{ $pengawas->pendidikan }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl class="dl-horizontal">
                            <dt>NIP :</dt>
                            <dd>{{ $pengawas->nip }}</dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Kartu Pegawai :</dt>
                            <dd>{{ $pengawas->karpeg }}</dd>
                        </dl>    
                        <dl class="dl-horizontal">
                            <dt>Golongan :</dt>
                            <dd>{{ $pengawas->golongan }}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Keterangan :</dt>
                            <dd>{{ $pengawas->keterangan }}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>TMT :</dt>
                            <dd>{{ $pengawas->tmt }}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Jabatan :</dt>
                            <dd>{{ $pengawas->jabatan }}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Sertifikasi :</dt>
                            <dd>{{ $pengawas->sertifikasi }}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Unit :</dt>
                            <dd>{{ $pengawas->unit }}</dd>
                        </dl>
                        @if (Auth::user()->is_admin)
                        <dl class="dl-horizontal">
                            <dt>Gaji :</dt>
                            <dd>
                                <?php
                                    $amount = $pengawas->gaji;

                                    if($amount === '-'){
                                        echo $amount;
                                    } else {
                                        setlocale(LC_ALL, 'IND'); 
                                        $locale = localeconv();
                                        echo $locale['currency_symbol'] . " ", number_format($amount, 2, $locale['decimal_point'], $locale['thousands_sep']);
                                    }    
                                ?>
                            </dd>
                        </dl>
                        @endif
                        
                    </div>
                </div>
            </div>
            
            <div class="panel-footer text-right">
                <form action="/admin/pengawas/{{ $pengawas->id }}" method="post" id="deleteform">
                {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                </form>
                <a href="/admin/pengawas/{{ $pengawas->id }}/edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                <button class="btn btn-danger" id="delete"<i class="fa fa-trash-o"></i> Delete</button>
            </div>

            @else
            <div class="alert alert-warning">Tidak ada pengawas.</div>
            @endif
        </div>
    @endif
    
@endsection
