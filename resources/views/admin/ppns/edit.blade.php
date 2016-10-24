@extends('layouts.app')

@section('title')
    Edit
    @if ($ppns)
        {{ $ppns->name }}
    @endif
     - Penataan Fungsional PPNS Ketenagakerjaan
@endsection

@section('content')
    <div class="col-md-6 col-md-offset-3">
    @if (session('notice'))
        @include(session('notice'))
    @endif 
    
    @if (Auth::guest() && Auth::user())
        @include('auth.layouts.login')
    @else

    <h2><strong>Edit PPNS</strong></h2>
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit PPNS - <em>{{ $ppns->name }}</em> 
        </div>
        <div class="panel-body">
            <form action="{{ url('admin/ppns') }}/{{ $ppns->id }}" method="post">
            <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                
                <div class="form-group{{ $errors->has('province_id') ? ' has-error' : '' }}">
                    <label for="province_id" class="control-label">Provinsi:</label>
                    <select class="form-control" name="province_id" id="role">
                        @foreach ($provinsi as $data)
                            @if ($ppns->province->id == $data->id)
                            <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                            @else
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if ($errors->has('province_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('province_id') }}</strong>
                        </span>
                    @endif
                </div>
                
                <hr>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Nama PPNS:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama ppns" value="{{ $ppns->name }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                    <label for="nip" class="control-label">Nip:</label>
                    <input type="text" name="nip" class="form-control" id="nip" placeholder="Nip" value="{{ $ppns->nip }}">
                    @if ($errors->has('nip'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nip') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                    <label for="unit" class="control-label">Unit:</label>
                    <input type="text" name="unit" class="form-control" id="unit" placeholder="Unit" value="{{ $ppns->unit }}">
                    @if ($errors->has('unit'))
                        <span class="help-block">
                            <strong>{{ $errors->first('unit') }}</strong>
                        </span>
                    @endif
                </div>
        </div>
        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-primary">Update PPNS</button>
        </div>
        </form>
        </div>
    </div>
        
    @endif
    </div>
@endsection
