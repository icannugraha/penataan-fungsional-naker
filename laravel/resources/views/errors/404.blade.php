@extends('layouts.app')

@section('content')

        <div class="panel panel-danger" id="notice">
            <div class="panel-heading">  
                ERROR!
                <button type="button" class="close" data-target="#notice" data-dismiss="alert"> <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>   
            </div>

            <div class="panel-body">
                <strong>ERROR 404!</strong> Page tidak ditemukan. Kembali ke <a href="{{ url('/') }}">beranda</a>.
            </div>
        </div>
@endsection