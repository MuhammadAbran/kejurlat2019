@extends('layouts.dashboard')
@extends('admin.menu')

@section('title', 'KEJURLAT 2019 | Dashboard User')
@push('styles')
<link href="{{ asset('master/css/plugins/dropzone/basic.css') }}" rel="stylesheet">
<link href="{{ asset('master/css/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
<link href="{{ asset('master/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endpush
@section('menus')
   <li>
       <a href="{{ route('dashboard.admin') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
   </li>
   <li>
       <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Data Kolat</span><span class="fa arrow"></span></a>
       <ul class="nav nav-second-level collapse">
         @foreach($user as $kolat)
            @if(!$kolat->role)
               <li><a href="{{ route('kolat.admin', $kolat->id) }}">KOLAT {{ $kolat->nama_instansi }}</a></li>
            @endif
         @endforeach
       </ul>
   </li>
   <li class="active">
       <a href="{{ route('upload.admin') }}"><i class="fa fa-file-text"></i> <span class="nav-label">Konfirmasi Berkas</span> <span class="pull-right label label-primary">2</span></a>
   </li>
   <li>
       <a href="{{ route('pembayaran.admin') }}"><i class="fa fa-credit-card"></i> <span class="nav-label">Pembayaran</span> <span class="label label-warning pull-right">12</span></a>
   </li>
   <li>
       <a href="{{ route('agenda.admin') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Management Agenda </span></a>
   </li>
   <li>
       <a href="{{ route('pengumuman.admin') }}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Pengumuman</span></a>
   </li>
@stop

@section('content')
<!-- breadcrumb -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Upload Berkas | KOLAT {{ Auth::user()->nama_instansi }}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard.admin') }}">Dashboard</a>
            </li>
            <li class="active">
                <strong>Pengumuman</strong>
            </li>
        </ol>
    </div>
</div>

@stop
