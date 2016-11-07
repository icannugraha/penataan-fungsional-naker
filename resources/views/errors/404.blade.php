@extends('layouts.app')

@section('title')
    Error 404 - Penataan Fungsional Pengawas Ketenagakerjaan
@endsection

@section('content')

        <div class="panel panel-danger" id="notice">
            <div class="panel-heading">  
                ERROR!
            </div>

            <div class="panel-body">
                <strong>ERROR 404!</strong> Page tidak ditemukan. Kembali ke <a href="{{ url('/') }}">beranda</a>.
            </div>
        </div>
@endsection