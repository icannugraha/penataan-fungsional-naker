@extends('layouts.app')

@section('title')
    Home - Aplikasi Penataan Fungsional Pengawas Ketenagakerjaan
@endsection

@section('css')
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    .owl-theme .owl-controls .owl-buttons div {
        padding: 5px 10px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
    }
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
        
        <div id="owl-demo" class="owl-carousel owl-theme">
            <div class="item"><img class="lazyOwl" data-src="/assets/images/9.jpg" class="img-responsive"></div>
            <div class="item"><img class="lazyOwl" data-src="/assets/images/2.jpg" class="img-responsive"></div>
            <div class="item"><img class="lazyOwl" data-src="/assets/images/3.jpg" class="img-responsive"></div>
            <div class="item"><img class="lazyOwl" data-src="/assets/images/4.jpg" class="img-responsive"></div>
            <div class="item"><img class="lazyOwl" data-src="/assets/images/5.jpg" class="img-responsive"></div>
            <div class="item"><img class="lazyOwl" data-src="/assets/images/6.jpg" class="img-responsive"></div>
            <div class="item"><img class="lazyOwl" data-src="/assets/images/7.jpg" class="img-responsive"></div>
            <div class="item"><img class="lazyOwl" data-src="/assets/images/8.jpg" class="img-responsive"></div>
            <div class="item"><img class="lazyOwl" data-src="/assets/images/1.jpg" class="img-responsive"></div>
            <div class="item"><img class="lazyOwl" data-src="/assets/images/10.jpg" class="img-responsive"></div>
        </div>

        <br>
        
        <div class="row">
            <div class="col-md-4">
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

            <div class="col-md-8">
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
                        <th>Jumlah PPNS</th>
                    </tr>
                    @foreach ($provinces as $province)
                        <tr>
                            <td><a href="{{ url('/provinsi') }}/{{ $province->id }}">{{ $province->name }}</a></td>
                            <td>{{ $province->pengawas->count() }}</td>
                            <td>{{ $province->ppns->count() }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="3" class="text-center">
                                {{ $provinces->links() }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('js')
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
          navigation : false, // Show next and prev buttons
          navigationText: [
          '<i class="fa fa-chevron-left"></i>',
          '<i class="fa fa-chevron-right"></i>'
          ],
          slideSpeed : 300,
	  autoPlay: 5000,
          pagination: true,
          paginationSpeed : 400,
          lazyLoad : true,
          singleItem:true,
      });
     
    });
@endsection
