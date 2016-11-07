@extends('layouts.app')

@section('title')
    @if($ppns) 
        {{ $ppns->name }}
    @endif
    - Penataan Fungsional PPNS Ketenagakerjaan
@endsection

@section('content')
   
    @if (Auth::guest())
        @include('auth.layouts.login')
    @else
    <div class="col-md-8 col-md-offset-2">
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
            </div>

            <form method="get" class="form-horizontal col-md-9 top-buffer" action="{{ url('search') }}">
                <div id="custom-search-input">
                    <div id="custom-search-input">
                        <div class="input-group">
                            <input type="text" class="search-query form-control" name="s" id="s" placeholder="Cari nama ppns..." />
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

        @if($ppns)            
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>Detail Data PPNS - <em>{{ $ppns->name }}</em></strong>
                    </div>

                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Provinsi :</dt>
                            <dd>{{ $provinsi->name }}</dd>
                        </dl>
                        <hr>
                        <dl class="dl-horizontal">
                            <dt>Nama :</dt>
                            <dd>{{ $ppns->name }}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>NIP :</dt>
                            <dd>{{ $ppns->nip }}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Unit :</dt>
                            <dd>{{ $ppns->unit }}</dd>
                        </dl>
                    </div>
                    @if (Auth::user()->is_admin)
                        <div class="panel-footer text-right">
                            <form action="/admin/ppns/{{ $ppns->id }}" method="post" id="deleteform">
                            {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                            <a href="/admin/ppns/{{ $ppns->id }}/edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            <button class="btn btn-danger" id="delete"<i class="fa fa-trash-o"></i> Delete</button>
                        </div>
                    @endif
                </div>
        @else
            <dl class="dl-horizontal">
                <dd>PPNS tidak ditemukan.</dd>
            </dl>
        @endif
    </div>
    @endif
@endsection
