@extends('layouts.dashboard')
@extends('user.menu')

@section('title', 'KEJURLAT 2019 | Dashboard User')
@push('styles')
<meta name="csrf" content="{{ csrf_token() }}">
<link href="{{ asset('master/css/plugins/dropzone/basic.css') }}" rel="stylesheet">
<link href="{{ asset('master/css/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
<link href="{{ asset('master/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<link href="{{ asset('master/css/plugins/blueimp/css/blueimp-gallery.min.css') }}" rel="stylesheet">

<!-- Ladda style -->
<link href="{{ asset('master/css/plugins/ladda/ladda-themeless.min.css') }}" rel="stylesheet">
@endpush
@section('menus')
   <li>
       <a href="{{ route('dashboard.user') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
   </li>
   <li>
       <a href="{{ route('agenda.user') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Agenda</span></a>
   </li>
   <li class="active">
       <a href="{{ route('upload.user') }}"><i class="fa fa-file-text"></i> <span class="nav-label">Upload Berkas</span> <span class="pull-right label label-primary">!</span></a>
   </li>
   <li style="display: {{ Auth::user()->progress < 30 ? 'none' : '' }}">
       <a href="{{ route('atlit.user') }}"><i class="fa fa-users"></i> <span class="nav-label">Data Atlit </span></a>
   </li>
   <li style="display: {{ Auth::user()->progress < 60 ? 'none' : '' }}">
       <a href="{{ route('pembayaran.user') }}"><i class="fa fa-credit-card"></i> <span class="nav-label">Pembayaran</span> <span class="label label-success pull-right">!</span></a>
   </li>
   <li>
       <a href="{{ route('pengumuman.user') }}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Pengumuman</span></a>
   </li>
@stop

@section('content')
<!-- breadcrumb -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
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
    <div class="col-lg-4">
        <div class="title-action animated fadeInRight">
            <a href="#" class="ladda-button btn btn-success refresh-btn" data-style="zoom-in"><i class="fa fa-refresh"></i></a>
            <a href="{{ url('storage\surat\surat_1.jpg') }}" class="btn btn-white" data-gallery="#contoh"><i class="fa fa-file-text-o"></i> Contoh Surat</a>
            <a href="{{ url('storage\surat\surat_2.jpg') }}" class="btn btn-white" data-gallery="#contoh" style="display:none"></a>
            <a href="#" data-id="{{ Auth::user()->id }}" class="btn btn-primary kunci_data" {{ Auth::user()->progress > 0 || count(Auth::user()->berkas) < 2 ? 'disabled' : '' }}><i class="fa fa-lock"></i> Kunci Data </a>
        </div>
   </div>
</div>
@if(Auth::user()->progress == 15)
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
               <div class="ibox-content" style="border-left: 4px solid #f9ca24">
                 <h4><i class="fa fa-clock-o text-warning"></i> Menunggu Konfirmasi Admin...</h4>
              </div>
            </div>
         </div>
      </div>
@elseif(Auth::user()->progress >= 30)
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
               <div class="ibox-content" style="border-left: 4px solid #0097e6">
                 <h4><i class="fa fa-check text-success"></i> Berkas yang anda kirim telah terkonfirmasi, silahkan lakukan progress Selanjutnya.</h4>
              </div>
            </div>
         </div>
      </div>
@else
<div class="wrapper wrapper-content  animated fadeInRight">
@endif

    <div class="row" style="display: {{ Auth::user()->progress > 0 ? 'none' : '' }}">
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
            <div class="ibox-content ibox-heading" style="border-left: 4px solid red">
               <h5><i class="fa fa-refresh text-success"></i> Refresh Halaman setelah upload file untuk melihat detail file dan untuk mengunci data.</h5>
            </div>
            <div class="ibox-content">
                <form id="my-awesome-dropzone" class="dropzone" method="POST" enctype="multipart/form-data" action="{{ route('upload.user.data') }}">
                   @csrf
                   <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                </form>
             </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
           @foreach($berkas as $file)
            <div class="file-box">
                <div class="file">
                   <button data-id="{{ $file->id }}" type="button" class="btn btn-xs btn-primary pull-right del_berkas"  style="display: {{ Auth::user()->progress > 0 ? 'none' : '' }}"><i class="fa fa-trash"></i></button>
                    <a href="{{ url('storage\berkas\\'.$file->berkas) }}" data-gallery="">
                        <span class="corner"></span>
                        <div class="image">
                           <img alt="image" class="img-responsive" src="{{ url('storage\berkas\\'.$file->berkas) }}">
                        </div>
                        <div class="file-name">
                           {{ $file->berkas }}
                           <br/>
                           <small>{{ $file->updated_at }}</small>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
     </div>
     </div>
</div>
@stop

@push('scripts')
<div class="lightBoxGallery">
    <div id="blueimp-gallery" class="blueimp-gallery">
      <div class="slides"></div>
      <h3 class="title"></h3>
      <a class="prev">‹</a>
      <a class="next">›</a>
      <a class="close">×</a>
      <a class="play-pause"></a>
      <ol class="indicator"></ol>
   </div>

   <div id="contoh" class="blueimp-gallery">
     <div class="slides"></div>
     <h3 class="title"></h3>
     <a class="prev">‹</a>
     <a class="next">›</a>
     <a class="close">×</a>
     <a class="play-pause"></a>
     <ol class="indicator"></ol>
  </div>
</div>
<!-- DROPZONE -->
<script src="{{ asset('master/js/plugins/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('master/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<!-- blueimp gallery -->
<script src="{{ asset('master/js/plugins/blueimp/jquery.blueimp-gallery.min.js') }}"></script>
<!-- Ladda -->
<script src="{{ asset('master/js/plugins/ladda/spin.min.js') }}"></script>
<script src="{{ asset('master/js/plugins/ladda/ladda.min.js') }}"></script>
<script src="{{ asset('master/js/plugins/ladda/ladda.jquery.min.js') }}"></script>

<script>
   $(document).ready(function(){

      var l = $( '.refresh-btn' ).ladda();

      l.click(function(){
          // Start loading
          l.ladda( 'start' );
          window.location.reload();

          // Timeout example
          // Do something in backend and then stop ladda
          setTimeout(function(){
             l.ladda('stop');
          },12000)


      });

      $('.del_berkas').on('click', function(){
         var id = $(this).data('id');
         $.ajax({
            url: "{{ route('upload.user.del') }}",
            data: {id: id},
            method: "POST",
            headers: {
               "X-CSRF-TOKEN": $('meta[name=csrf]').attr('content')
            },
            success: function(data){
               swal("Terhapus!", "Data Berhasil dihapus.", "success");
               setTimeout(function(){
                  window.location.reload();
               },1000);
            },
            error: function(){
               console.error("error");
            }
         });
      });

        Dropzone.options.myAwesomeDropzone = {

            dictCancelUpload: true,
            maxFilesize: 2,
            addRemoveLinks: true,
            maxFiles: 2,

        }

        $('.kunci_data').on('click', function () {
           var user_id = $(this).data('id');
            swal({
                        title: "Anda Yakin?",
                        text: "Data yang telah dikunci tidak akan dapat diupload ulang kecuali file tersebut tidak terkonfirmasi!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, Kunci!",
                        cancelButtonText: "Tidak!",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                           $.ajax({
                              url: "{{ route('upload.kunci.data') }}",
                              method: "POST",
                              headers: {
                                 "X-CSRF-TOKEN": $('meta[name=csrf]').attr('content')
                              },
                              data: {id: user_id},
                              success: function(){
                                 swal("Terkunci!", "Data Berhasil dikunci.", "success");
                                 window.location.reload();
                              }
                           });
                        } else {
                            swal("Tidak jadi", "Data Tidak jadi dikunci", "error");
                        }
                    });
        });

   });
</script>
@endpush
