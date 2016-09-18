@extends('layouts.app')

@section('title')
    Home - Aplikasi Penataan Fungsional Pengawas Ketenagakerjaan
@endsection

@section('content')
    @if (session('notice'))
        @include(session('notice'))
    @endif 
    
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
                <ul class="dropdown-menu" style="left:15px">
                    @if(!$provinces->isEmpty())
                        @foreach($provinces as $province)
                            <li><a href="{{ url('/provinsi') }}/{{ $province->id }}">{{ $province->name }}</a></li>
                        @endforeach
                    @else
                        <li>Tidak ada provinsi.</li>
                    @endif
                </ul>
                <br>
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
                       
        @if(!$pengawas->isEmpty())            
            <div class="panel panel-primary">
                <div class="panel-heading"> 
                    <strong>Daftar Semua Pengawas</strong>
                </div>
                <div class="panel-body">
                    Result: <strong>{{ $counter }}</strong> pengawas.</p>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="white-space:nowrap;">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Provinsi</th>
                                <th>NIP</th>
                                <th>Unit</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $count = $pengawas->firstItem() ?>
                            @foreach($pengawas as $data)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td><a href="{{ url('pengawas') }}/{{ $data->id }}">{{ $data->name }}</a></td>
                                <td><a href="{{ url('provinsi') }}/{{ $data->province->id }}">{{ $data->province->name }}</a></td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->unit }}</td>
                                <td>
                                    <a href="{{ url('pengawas') }}/{{ $data->id }}" class="btn btn-xs btn-info"><i class="fa fa-info-circle "></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="panel-footer">
                    <div class="text-center">
                        <small>{{ $pengawas->links() }}</small>
                    </div>
                </div>
        </div>
        @else
            <div class="alert alert-warning" role="alert">
                <strong>Error!</strong> Pengawas tidak ditemukan.
            </div>
        @endif
    @endif
@endsection
