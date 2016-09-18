@extends('layouts.app')

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
        
        <hr>

        <h2><strong>Daftar Semua Pengawas</strong></h2>
        <p >Total <span class="label label-info">{{ $counter }}</span> pengawas.</p>
        <hr>
        
        <div class="row">
        @if(!$pengawas->isEmpty())            
            <?php $count = $pengawas->firstItem() ?>
            @foreach($pengawas as $data)
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ $count++ }}. 
                        <strong><a class="a-mine" href="{{ url('pengawas') }}/{{ $data->id }}">{{ $data->name }}</a></strong>
                    </div>
                    <div class="panel-body">
                        <dl>
                            <dt>Provinsi :</dt>
                            <dd class="text-capitalize">{{ $data->province->name }}</dd>
                        </dl>
                        <hr>
                        <dl>
                            <dt>NIP :</dt>
                            <dd>{{ $data->nip }}</dd>
                        </dl>
                        <dl>
                            <dt>Unit :</dt>
                            <dd>{{ $data->unit }}</dd>
                        </dl>
                    </div>
                    <div class="panel-footer text-right">
                        <a href="{{ url('pengawas') }}/{{ $data->id }}" class="btn btn-sm btn-info">More Details...</a>
                    </div>
                </div>
            </div>
            @endforeach
        @else

            <div class="panel panel-warning" id="notice">
                <div class="panel-body">
                    <strong>Pengawas tidak ditemukan.</strong>
                </div>
            </div>
        @endif
        </div>

        <small>{{ $pengawas->links() }}</small>
    @endif
@endsection