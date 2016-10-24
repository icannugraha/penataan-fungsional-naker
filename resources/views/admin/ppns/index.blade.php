@extends('layouts.app')

@section('title')
    Manage PPNS - Penataan Fungsional Pengawas Ketenagakerjaan
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
        <h2><strong>Manage PPNS</strong></h2>
        <br>
        <a href="{{ url('admin/ppns/create')}}" class="btn btn-primary"><i class="fa fa-btn fa-plus"></i>Tambah PPNS</a>
        
        <br>
        <br>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <strong>Daftar PPNS</strong>
            </div>
            @if ($ppns)
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr style="white-space:nowrap;">
                            <th class="col-xs-1">No</th>
                            <th class="col-xs-4">Provinsi</th>
                            <th class="col-xs-6">Nama</th>
                            <th class="col-xs-1"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $count = $ppns->firstItem() ?>
                        @foreach ($ppns as $data)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td><a href="{{ url('ppnsprovinsi') }}/{{ $data->province->id }}">{{ $data->province->name }}</a></td>
                            <td><a href="{{ url('admin/ppns') }}/{{ $data->id }}">{{ $data->name }}</a></td>
                            <td>  
                                <form action="admin/ppns/{{ $data->id }}" method="post" id="deleteform">
                                {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                                <a href="{{ url('admin/ppns') }}/{{ $data->id }}" class="btn btn-xs btn-info"><i class="fa fa-info-circle "></i></a>
                                <a href="{{ url('admin/ppns') }}/{{ $data->id }}/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil "></i></a>
                                <button id="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>
                            </td>
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
                    
            @else
                <div class="alert alert-warning">Tidak ada PPNS.</div>
            @endif
        </div>
    @endif
    
@endsection
