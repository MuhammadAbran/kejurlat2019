@extends('layouts.dashboard')
@extends('user.menu')

@section('title', 'KEJURLAT 2019 | Dashboard User')
@push('styles')
<style media="screen">
   .info2{
      display: none;
   }
   @media only screen and (max-width: 1170px) {
     .info1{
        display: none;
     }
     .info2{
        display: block;
     }
   }
</style>
@endpush
@section('menus')
   <li>
       <a href="{{ route('dashboard.user') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
   </li>
   <li class="active">
       <a href="{{ route('agenda.user') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Agenda</span></a>
   </li>
   <li>
       <a href="{{ route('upload.user') }}"><i class="fa fa-file-text"></i> <span class="nav-label">Upload Berkas</span> <span class="pull-right label label-primary">!</span></a>
   </li>
   <li>
       <a href="{{ route('atlit.user') }}"><i class="fa fa-users"></i> <span class="nav-label">Data Atlit </span></a>
   </li>
   <li>
       <a href="{{ route('pembayaran.user') }}"><i class="fa fa-credit-card"></i> <span class="nav-label">Pembayaran</span> <span class="label label-success pull-right">!</span></a>
   </li>
   <li>
       <a href="{{ route('pengumuman.user') }}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Pengumuman</span></a>
   </li>
@stop
@section('content')
<!-- breadcrumb -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Agenda KEJURLAT 2019 | KOLAT {{ Auth::user()->nama_instansi }}</h2>
        <ol class="breadcrumb">
           <li>
               Dashboard
           </li>
            <li class="active">
                <strong>Agenda</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

@stop
