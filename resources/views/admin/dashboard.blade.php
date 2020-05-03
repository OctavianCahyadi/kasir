@extends('layouts.admin',['module'=>'Dashboard','judul'=>'Dashboard'])
@section('title')
    <title>Dashboard Administrator</title>
@endsection
@section('content')
<div class="container align-item-center">
    <div class="row align-center">
        <div class="col-md-12 text-center">
            <h3> MANAGEMENT TOKO</h3>
            <img src="../img/logo_title_down.png"alt="Logo Toko" class="img" style="opacity: .8; width: 20%">
            <h1> Selamat Datang di Sistem Managemen Toko</h1>
        </div>
    </div>   
    <div class="row justify-content-center">   
        <div class="col-md-12 text-center">
            @php
                $bln = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember'
                );
            @endphp 
            <h4> Tanggal :<b>{{date('d').' '.$bln[date('m')].' '.date('Y')}} </b></h4>
        </div> 
    </div>
</div>
@endsection