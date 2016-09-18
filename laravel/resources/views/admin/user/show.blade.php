@extends('layouts.app')

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

        <h2><strong>Detail User</strong></h2>
       
        <hr>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <strong>{{ $user->name }}</strong>
            </div>

            <div class="panel-footer text-right"> 
                <form action="/admin/user/{{ $user->id }}" method="post" id="deleteform">
                {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE"> 
                </form>
                <a href="/admin/user/{{ $user->id }}/edit" class="btn btn-warning"><i class="fa fa-pencil "></i> Edit</a>
                <button class="btn btn-danger" id="delete"><i class="fa fa-trash-o"></i> Delete</button>
            </div>

            @if ($user)
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>Nama :</dt>
                    <dd>{{ $user->name }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Username :</dt>
                    <dd>{{ $user->username }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Email :</dt>
                    <dd>{{ $user->email }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Role :</dt>
                    <dd>
                        @if ($user->is_admin == 1)
                            Admin
                        @else
                            User
                        @endif
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Created at :</dt>
                    <dd>
                        {{ $user->created_at }}
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Updated at :</dt>
                    <dd>
                        {{ $user->updated_at }}
                    </dd>
                </dl>
            </div>
            
            <div class="panel-footer text-right"> 
                <form action="/admin/user/{{ $user->id }}" method="post" id="deleteform">
                {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE"> 
                </form>
                <a href="/admin/user/{{ $user->id }}/edit" class="btn btn-warning"><i class="fa fa-pencil "></i> Edit</a>
                <button class="btn btn-danger" id="delete"><i class="fa fa-trash-o"></i> Delete</button>
            </div>
                    
            @else
            <div class="alert alert-warning">Tidak ada user.</div>
            @endif
        </div>

    @endif
    
@endsection
