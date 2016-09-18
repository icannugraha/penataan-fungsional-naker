@extends('layouts.app')

@section('title')
    Manage Pengawas - Penataan Fungsional Pengawas Ketenagakerjaan
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

        <h2><strong>Manage Pengawas</strong></h2>
        <br>
        <a href="{{ url('admin/pengawas/create')}}" class="btn btn-primary"><i class="fa fa-btn fa-plus"></i>Tambah Pengawas</a>
        
        <hr>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <strong>Daftar Pengawas</strong>
            </div>
            @if ($pengawas)
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr style="white-space:nowrap;">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Provinsi</th>
                            <th>NIP</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $count = $pengawas->firstItem() ?>
                        @foreach ($pengawas as $data)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td><a href="{{ url('admin/pengawas') }}/{{ $data->id }}">{{ $data->name }}</a></td>
                            <td><a href="{{ url('provinsi') }}/{{ $data->province->id }}">{{ $data->province->name }}</a></td>
                            <td>{{ $data->nip }}</td>
                            <td>  
                                <form action="/admin/pengawas/{{ $data->id }}" method="post" id="deleteform">
                                {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                                <a href="{{ url('admin/pengawas') }}/{{ $data->id }}" class="btn btn-xs btn-info"><i class="fa fa-info-circle "></i></a>
                                <a href="{{ url('admin/pengawas') }}/{{ $data->id }}/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil "></i></a>
                                <button id="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>
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
                    
            @else
                <div class="alert alert-warning">Tidak ada pengawas.</div>
            @endif
        </div>
        
    @endif
    
@endsection
