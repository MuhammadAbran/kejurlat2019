@extends('layouts.dashboard')
@extends('user.menu')

@section('title', 'KEJURLAT 2019 | Dashboard User')
@push('styles')
<link href="{{ asset('master/css/plugins/dropzone/basic.css') }}" rel="stylesheet">
<link href="{{ asset('master/css/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
<link href="{{ asset('master/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endpush
@section('menus')
   <li>
       <a href="{{ route('dashboard.user') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
   </li>
   <li>
       <a href="#"><i class="fa fa-calendar"></i> <span class="nav-label">Agenda</span><span class="fa arrow"></span></a>
       <ul class="nav nav-second-level collapse">
           <li><a href="#">A</a></li>
           <li><a href="#">B</a></li>
           <li><a href="#">C</a></li>
       </ul>
   </li>
   <li class="active">
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
        <h2>Upload Berkas | KOLAT {{ Auth::user()->nama_instansi }}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard.user') }}">Dashboard</a>
            </li>
            <li class="active">
                <strong>Upload Berkas</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Upload Surat Delegasi & Surat Kontingen</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form id="my-awesome-dropzone" class="dropzone" action="#">
                    <div class="dropzone-previews"></div>
                    <button type="submit" class="btn btn-primary pull-right demo4">Upload Semua Berkas!</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@stop

@push('scripts')
<!-- DROPZONE -->
<script src="{{ asset('master/js/plugins/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('master/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

<script>
   $(document).ready(function(){
      $('.demo4').click(function () {
          swal({
                      title: "Anda Yakin?",
                      text: "Data yang sudah diupload tidak dapat diupload ulang sebelum dikonfirmasi oleh admin!",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Ya, Upload!",
                      cancelButtonText: "Tidak, Tidak Jadi!",
                      closeOnConfirm: false,
                      closeOnCancel: false },
                  function (isConfirm) {
                      if (isConfirm) {
                          swal("Terkirim!", "File Berhasil Diupload.", "success");
                      } else {
                          swal("Dibatalkan", "File Tidak Jadi Diupload", "error");
                      }
                  });
      });

        Dropzone.options.myAwesomeDropzone = {

            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,

            // Dropzone settings
            init: function() {
                var myDropzone = this;

                this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("sendingmultiple", function() {
                });
                this.on("successmultiple", function(files, response) {
                });
                this.on("errormultiple", function(files, response) {
                });
            }

        }

   });
</script>
@endpush
