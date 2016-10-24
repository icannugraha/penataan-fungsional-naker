@extends('layouts.app')

@section('title')
    @if($pengawas) 
        {{ $pengawas->name }}
    @endif
    - Penataan Fungsional Pengawas Ketenagakerjaan
@endsection

@section('content')
   
    @if (Auth::guest())
        @include('auth.layouts.login')
    @else
        <div class="row">
            <!-- Split button -->
            <div class="btn-group col-md-3 top-buffer">
                <label type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Provinsi</label>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu dualcolumns" style="left:15px">
                    @if(!$provinces->isEmpty())
                        @foreach($provinces as $province)
                            <li><a href="{{ url('/provinsi') }}/{{ $province->id }}">{{ $province->name }}</a></li>
                        @endforeach
                    @else
                        <li>Tidak ada provinsi.</li>
                    @endif
                </ul>
            </div>

            <form method="get" class="form-horizontal col-md-9 top-buffer" action="{{ url('search') }}">
                <div id="custom-search-input">
                    <div id="custom-search-input">
                        <div class="input-group">
                            <input type="text" class="search-query form-control" name="s" id="s" placeholder="Cari nama pengawas..." />
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    <span class=" glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <br>

        @if($pengawas)            
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>Detail Data Pengawas - <em>{{ $pengawas->name }}</em></strong>
                    </div>

                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Provinsi :</dt>
                            <dd>{{ $provinsi->name }}</dd>
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
                    @if (Auth::user()->is_admin)
                        <div class="panel-footer text-right">
                            <form action="/admin/pengawas/{{ $pengawas->id }}" method="post" id="deleteform">
                            {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                            <a href="/admin/pengawas/{{ $pengawas->id }}/edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            <button class="btn btn-danger" id="delete"<i class="fa fa-trash-o"></i> Delete</button>
                        </div>
                    @endif
                </div>
        @else
            <dl class="dl-horizontal">
                <dd>Pengawas tidak ditemukan.</dd>
            </dl>
        @endif
    @endif
@endsection
