@extends('layouts.app')

@section('content')
    @if (session('notice'))
        @include(session('notice'))
    @endif 
    
    @if (Auth::guest() && Auth::user())
        @include('auth.layouts.login')
    @else

    <div class="col-md-6 col-md-offset-3">
        <h2><strong>Edit User</strong></h2>
        <hr>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Edit User - <em>{{ $user->name }}</em> 
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/user') }}/{{ $user->id }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Name:</label>
                            <input type="text" name="name" class="form-control" id="user-name" placeholder="nama" value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="control-label">Username:</label>
                            <input type="text" name="username" class="form-control" id="user-username" placeholder="username" value="{{ $user->username }}">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="user-email" placeholder="email" value="{{ $user->email }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('is_admin') ? ' has-error' : '' }}">
                            <label for="role" class="control-label">Role:</label>
                            <select class="form-control" name="is_admin" id="role">
                                <option value="0" {{ $user->is_admin ? ' selected' : '' }}>User</option>
                                <option value="1" {{ $user->is_admin ? ' selected' : '' }}>Admin</option>
                            </select>
                            @if ($errors->has('is_admin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('is_admin') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <hr>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                        
                </form>
            </div>
        </div>
    </div>
        
    @endif

@endsection
