@extends('layouts.dashboard')
@extends('admin.menu')

@section('title', 'KEJURLAT 2019 | Konfirmasi Berkas')
@push('styles')
<link href="{{ asset('master/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
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
        <h2>Konfirmasi Berkas | Surat Delegasi & Kontingen</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard.user') }}">Dashboard</a>
            </li>
            <li class="active">
                <strong>Konfirmasi Berkas</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
      <div class="ibox float-e-margins">
           <div class="ibox-title">
               <h5>Tabel Konfirmasi Berkas</h5>
               <div class="ibox-tools">
                   <a class="collapse-link">
                       <i class="fa fa-chevron-up"></i>
                   </a>
               </div>
           </div>
           <div class="ibox-content">

               <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover dataTables-example" >
           <thead>
           <tr>
               <th>No</th>
               <th>Kolat</th>
               <th>Ketua Kolat</th>
               <th>Surat Delegasi</th>
               <th>Surat Kontingen</th>
               <th>Action</th>
           </tr>
           </thead>
           <tbody></tbody>
           <tfoot>
           <tr>
                <th>No</th>
                <th>Kolat</th>
                <th>Ketua Kolat</th>
                <th>Surat Delegasi</th>
                <th>Surat Kontingen</th>
                <th>Action</th>
           </tr>
           </tfoot>
           </table>
               </div>

           </div>
      </div>
  </div>
    </div>
    </div>
@stop

@push('scripts')
<script src="{{ asset('master/js/plugins/dataTables/datatables.min.js') }}"></script>
<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ],
        });
    });
</script>
@endpush
