@extends('layouts.app')

@section('title')
    Manage User - Penataan Fungsional Pengawas Ketenagakerjaan
@endsection

@section('content')
    @if (session('notice'))
        @include(session('notice'))
    @endif 
    
    @if (Auth::guest() && Auth::user())
        @include('auth.layouts.login')
    @else
    <div class="col-md-6 col-md-offset-3">
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Sukses!</strong> {!! session('message') !!}
        </div>  
        @endif

        <h2><strong>Manage User</strong></h2>
        <br>
        <a href="{{ url('admin/user/create')}}" class="btn btn-primary"><i class="fa fa-btn fa-user-plus"></i>Tambah User</a>
        <br>
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <strong>Daftar User</strong>
            </div>
            @if ($user)
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr style="white-space:nowrap;">
                            <th>No</th>
                            <th class="col-xs-8">Nama</th>
                            <th class="col-xs-4"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $count = $user->firstItem() ?>
                        @foreach ($user as $data)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td><a href="{{ url('admin/user') }}/{{ $data->id }}">{{ $data->name }}</a></td>
                            <td>
                                
                                <form action="/admin/user/{{ $data->id }}" method="post" id="deleteform">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                                <a href="{{ url('admin/user') }}/{{ $data->id }}" class="btn btn-xs btn-info"><i class="fa fa-info-circle "></i></a>
                                <a href="{{ url('admin/user') }}/{{ $data->id }}/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil "></i></a>
                                <button id="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <div class="text-center">
                    <small>{{ $user->links() }}</small>
                </div>
            </div>
                    
            @else
                <div class="alert alert-warning">Tidak ada user.</div>
            @endif
        </div>
    </div>
    @endif
    
@endsection
