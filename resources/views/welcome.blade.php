@extends('layouts.app')

@section('title')
    Home - Aplikasi Penataan Fungsional Pengawas Ketenagakerjaan
@endsection

@section('content')
    @if (session('notice'))
        @include(session('notice'))
    @endif 
    
    @if (Auth::guest())
        @include('auth.layouts.login')
    @else
    <div class="col-md-8 col-md-offset-2">
        <div class="jumbotron">
            <h1>Aplikasi Sederhana</h1>
            <p>Penataan Fungsional Pengawas Ketenagakerjaan setelah berlakunya undang-undang no. 23 th. 2014 melalui pemutakhiran data pengawas ketenagakerjaan.</p>
            <a class="btn btn-success" href="{{ url('pengawas') }}" role="button">Pengawas</a>
            <a class="btn btn-primary" href="{{ url('ppns') }}" role="button">PPNS</a>
        </div>
        
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Statistik</div>
                <div class="panel-body">
                    <table>
                        <tr>
                            <td>Jumlah User &nbsp;</td>
                            <td>:</td>
                            <td>&nbsp; {{ $jumlahuser }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Pengawas &nbsp;</td>
                            <td>:</td>
                            <td>&nbsp; {{ $jumlahpengawas }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah PPNS &nbsp;</td>
                            <td>:</td>
                            <td>&nbsp; {{ $jumlahppns }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Provinsi &nbsp;</td>
                            <td>:</td>
                            <td>&nbsp; {{ $jumlahprovinsi }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            
        </div>

        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Provinsi</div>
                <div class="panel-body">
                    <form action="{{ url()->current() }}" method="get">
                        Sort: &nbsp;
                        <button class="btn btn-xs" name="sort" value="asc">A-Z</button>
                        <button class="btn btn-xs" name="sort" value="desc">Z-A</button>
                    </form>
                </div>
                <table class="table table-bordered">
                    <tr>
                    <th class="col-xs-10">Provinsi</th>
                    <th>Jumlah Pengawas</th>
                </tr>
                @foreach ($provinces as $province)
                    <tr>
                        <td><a href="{{ url('/provinsi') }}/{{ $province->id }}">{{ $province->name }}</a></td>
                        <td>{{ $province->pengawas->count() }}</td>
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="2" class="text-center">
                            {{ $provinces->links() }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection
