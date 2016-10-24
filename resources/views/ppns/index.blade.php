@extends('layouts.app')

@section('title')
    Daftar Semua PPNS - Aplikasi Penataan Fungsional Pengawas Ketenagakerjaan
@endsection

@section('content')
    @if (session('notice'))
        @include(session('notice'))
    @endif 
    
    @if (Auth::guest())
        @include('auth.layouts.login')
    @else
        <div class="col-lg-8 col-lg-offset-2">
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
                                <li><a href="{{ url('ppnsprovinsi') }}/{{ $province->id }}">{{ $province->name }}</a></li>
                            @endforeach
                        @else
                            <li>Tidak ada provinsi.</li>
                        @endif
                    </ul>
                    <br>
                </div>


                <form method="get" class="form-horizontal col-md-9 top-buffer" action="{{ url('ppnssearch') }}">
                    <div id="custom-search-input">
                        <div id="custom-search-input">
                            <div class="input-group">
                                <input type="text" class="search-query form-control" name="s" id="s" placeholder="Cari nama PPNS..." />
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

            @if(!$ppns->isEmpty())            
                <div class="panel panel-primary">
                    <div class="panel-heading"> 
                        Daftar Semua PPNS
                    </div>
                    <div class="panel-body">
                        Result: <strong>{{ $counter }}</strong> PPNS
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="white-space:nowrap;">
                                    <th class="col-xs-1">No</th>
                                    <th class="col-xs-4">Provinsi</th>
                                    <th class="col-xs-7">Nama</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $count = $ppns->firstItem() ?>
                                @foreach($ppns as $data)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td><a href="{{ url('ppnsprovinsi') }}/{{ $data->province->id }}">{{ $data->province->name }}</a></td>
                                    <td><a href="{{ url('ppns') }}/{{ $data->id }}">{{ $data->name }}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="panel-footer">
                        <div class="text-center">
                            <small>{{ $ppns->links() }}</small>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    <strong>Error!</strong> PPNS tidak ditemukan.
                </div>
            @endif
        </div>
        
    @endif
@endsection
