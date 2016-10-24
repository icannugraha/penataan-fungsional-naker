@extends('layouts.app')

@section('title')
    About - Penataan Fungsional Pengawas Ketenagakerjaan
@endsection

@section('content')
<div class="col-md-6 col-md-offset-3">
    <h1><strong>Tentang Aplikasi</strong></h1>
    <br>
    <p>Aplikasi Sederhana Penataan Fungsional Pengawas Ketenagakerjaan setelah berlakunya <u>undang-undang no. 23 th. 2014</u> melalui pemutakhiran data pengawas ketenagakerjaan.</p>
    
	<br>

    <ul>
    	<li>Concept was designed by <strong>Mrs. Sri Astuti</strong></li>
    	<li>Developed by <a href="http://ienugr.com">ienugr.com</a> using <a href="//laravel.com">Laravel</a> PHP Framework & <a href="//getbootstrap.com">Bootstrap</a></li>
        <li><a href="https://github.com/uxweb/sweet-alert">Sweet Alert</a> is used to make the alert confirmation more beautiful</li>
    	<li>Testing demo using <a href="//ngrok.io">Ngrok</a> for efficiency in testing outside the local server behind a NAT or firewall to the internet</li>
    </ul>

	<hr>

	<div class="text-right">
    	<span class="label label-warning">This application is still under development.</span>
	</div>
</div>
@endsection
