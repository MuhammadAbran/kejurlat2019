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
   <li class="active">
       <a href="{{ route('dashboard.user') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
   </li>
   <li>
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
        <h2>Dashboard Registrasi | KOLAT {{ Auth::user()->nama_instansi }}</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Dashboard</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<!-- progress -->


    <!-- timeline -->
    <div class="wrapper wrapper-content animated fadeInRight">
       <div class="row">
          <div class="col-lg-12">
               <div class="ibox float-e-margins">
                   <div class="ibox-title">
                      <h5>Timeline Registrasi</h5>
                      <div class="ibox-tools">
                           <a class="collapse-link">
                               <i class="fa fa-chevron-up"></i>
                           </a>
                      </div>
                   </div>
                   <div class="ibox-content" id="ibox-content">
                      <div class="row">
                         <div class="col-lg-12">
                             <dl class="dl-horizontal">
                                 <dt>Progress Registrasi:</dt>
                                 <dd>
                                     <div class="progress progress-striped active m-b-sm">
                                         <div style="width: {{ Auth::user()->progress }}%;" class="progress-bar"></div>
                                     </div>
                                     @if(Auth::user()->progress == 100)
                                       <small>Proses Registrasi <strong>{{ Auth::user()->progress }}%</strong>. Menunggu Pengumuman Selanjutnya.. </small>
                                     @else
                                       <small>Proses Registrasi <strong>{{ Auth::user()->progress }}%</strong> Selesai. Segera lengkapi data dan upload berkas yang diperlukan.</small>
                                     @endif
                                 </dd>
                             </dl>
                         </div>
                     </div>
                      <!-- Info Panel -->
                      <div class="info1">
                        <div class="col-sm-3 pull-right">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                     <i class="fa fa-info-circle"></i> Info
                                </div>
                                <div class="panel-body">
                                   <div class="danger"><i class="fa fa-circle text-navy"></i> <span>Belum Selesai</span></div>
                                   <div class="danger"><i class="fa fa-circle text-info"></i> <span>Periode Saat Ini</span></div>
                                   <div class="warning"><i class="fa fa-circle text-warning"></i> <span>Menunggu Konfirmasi</span></div>
                                   <div class="success"><i class="fa fa-circle text-success"></i> <span>Selesai</span></div>
                                </div>
                            </div>
                        </div>
                      </div>

                      <div class="info2">
                        <div class="row">
                        <div class="col-sm-6 pull-left">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                     <i class="fa fa-info-circle"></i> Info
                                </div>
                                <div class="panel-body">
                                   <div class="danger"><i class="fa fa-circle text-navy"></i> <span>Belum Selesai</span></div>
                                   <div class="danger"><i class="fa fa-circle text-info"></i> <span>Periode Saat Ini</span></div>
                                   <div class="warning"><i class="fa fa-circle text-warning"></i> <span>Menunggu Konfirmasi</span></div>
                                   <div class="success"><i class="fa fa-circle text-success"></i> <span>Selesai</span></div>
                                </div>
                            </div>
                        </div>
                        </div>
                      </div>
                      <!-- end Info Panel -->

                       <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                          @component('component.timeline')
                              @slot('icon', 'fa-file-text')
                                 @if(Auth::user()->progress == 0)
                                    @slot('bg', 'lazur-bg')
                                    @slot('btn', 'info')
                                    @slot('btn_text', 'Upload Sekarang')
                                    @slot('displai', '')
                                    @slot('tgl_1', 'Segera Upload Berkas!')
                                 @elseif(Auth::user()->progress == 15)
                                    @slot('bg', 'yellow-bg')
                                    @slot('btn', 'grey')
                                    @slot('btn_text', '')
                                    @slot('displai', 'display: none;')
                                    @slot('tgl_1', 'Menunggu Konfirmasi...')
                                 @elseif(Auth::user()->progress == 30 || Auth::user()->progress > 30 )
                                    @slot('bg', 'blue-bg')
                                    @slot('btn', 'grey')
                                    @slot('btn_text', '')
                                    @slot('displai', 'display: none;')
                                    @slot('tgl_1', 'Upload Selesai')
                                 @endif
                              @slot('title', 'Upload Berkas')
                              @slot('text', 'Mengupload foto atau scan Surat Delegasi dan Surat Kontingen yang telah ditandatangani oleh Manager Kolat dan sudah sah.')
                              @slot('tgl_2', date('d-m-Y'))
                              @slot('route', route('upload.user'))
                          @endcomponent
                          @component('component.timeline')
                              @slot('icon', 'fa-users')
                                 @if(Auth::user()->progress == 30)
                                    @slot('bg', 'lazur-bg')
                                    @slot('btn', 'info')
                                    @slot('btn_text', 'Lengkapi Sekarang')
                                    @slot('displai', '')
                                    @slot('tgl_1', 'Segera Lengkapi Data!')
                                 @elseif(Auth::user()->progress == 60 || Auth::user()->progress > 60)
                                    @slot('bg', 'blue-bg')
                                    @slot('btn', 'grey')
                                    @slot('btn_text', '')
                                    @slot('displai', 'display: none;')
                                    @slot('tgl_1', 'Selesai Melengkapi Data')
                                 @else
                                    @slot('bg', 'navy-bg')
                                    @slot('btn', 'primary')
                                    @slot('btn_text', '')
                                    @slot('tgl_1', 'Belum Melengkapi Data!')
                                    @slot('displai', 'display: none;')
                                 @endif
                              @slot('title', 'Lengkapi Data Atlit')
                              @slot('text', 'Melengkapi data Atlit dan Mengupload berkas seperti pas foto, foto atau scan Surat Sehat, Surat Pernyataan, dan kartu identitas.')
                              @slot('tgl_2', date('d-m-Y'))
                              @slot('route', route('atlit.user'))
                          @endcomponent

                          @component('component.timeline')
                              @slot('icon', 'fa-credit-card')
                                 @if(Auth::user()->progress == 60)
                                    @slot('bg', 'lazur-bg')
                                    @slot('btn', 'info')
                                    @slot('btn_text', 'Upload Bukti Pembayaran')
                                    @slot('displai', '')
                                    @slot('tgl_1', 'Segera Upload Bukti Pembayaran!')
                                 @elseif(Auth::user()->progress == 75)
                                    @slot('bg', 'yellow-bg')
                                    @slot('btn', 'grey')
                                    @slot('btn_text', '')
                                    @slot('displai', 'display: none;')
                                    @slot('tgl_1', 'Menunggu Konfirmasi...')
                                 @elseif(Auth::user()->progress == 100)
                                    @slot('bg', 'blue-bg')
                                    @slot('btn', 'grey')
                                    @slot('btn_text', '')
                                    @slot('displai', 'display: none;')
                                    @slot('tgl_1', 'Selesai Mengupload Bukti Pembayaran')
                                 @else
                                    @slot('bg', 'navy-bg')
                                    @slot('btn', 'primary')
                                    @slot('btn_text', '')
                                    @slot('tgl_1', 'Belum Mengupload Bukti Pembayaran!')
                                    @slot('displai', 'display: none;')
                                 @endif
                              @slot('title', 'Pembayaran')
                              @slot('text', 'Pembayaran dilakukan dengan transfer sesuai jumlah yang tertera pada payment bill sesuai jumlah atlit yang didaftarkan dan sudah termasuk biaya kontingen dan administrasi.')
                              @slot('tgl_2', date('d-m-Y'))
                              @slot('route', route('pembayaran.user'))
                          @endcomponent

                          @component('component.timeline')
                              @slot('icon', 'fa-clock-o')
                                 @if(Auth::user()->progress == 100)
                                    @slot('bg', 'yellow-bg')
                                    @slot('btn', 'primary')
                                    @slot('btn_text', '')
                                    @slot('displai', 'display: none;')
                                    @slot('tgl_1', 'Pengumuman')
                                 @else
                                    @slot('bg', 'navy-bg')
                                    @slot('btn', 'primary')
                                    @slot('btn_text', '')
                                    @slot('tgl_1', 'Menunggu Pengumuman...')
                                    @slot('displai', 'display: none;')
                                 @endif
                              @slot('title', 'Menunggu Pengumuman Selanjutnya...')
                              @slot('text', '')
                              @slot('tgl_2', date('d-m-Y'))
                              @slot('route', route('pembayaran.user'))
                          @endcomponent

                       </div>

                   </div>
               </div>
          </div>
       </div>
    </div>
@stop
