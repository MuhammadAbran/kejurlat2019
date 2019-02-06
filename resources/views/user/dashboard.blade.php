@extends('layouts.dashboard')
@extends('user.menu')

@section('title', 'KEJURLAT 2019 | Dashboard User')
@section('menus')
   <li class="active">
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
    <div class="wrapper wrapper-content animated fadeInRight">
       <div class="row">
          <div class="col-lg-12">
               <div class="ibox float-e-margins">
                   <div class="ibox-title">
                      <h5>Progress Registrasi</h5>
                      <div class="ibox-tools">
                           <a class="collapse-link">
                               <i class="fa fa-chevron-up"></i>
                           </a>
                      </div>
                   </div>
                   <div class="ibox-content">
                      <div class="row">
                         <div class="col-lg-12">
                             <dl class="dl-horizontal">
                                 <dt>Selesai:</dt>
                                 <dd>
                                     <div class="progress progress-striped active m-b-sm">
                                         <div style="width: 60%;" class="progress-bar"></div>
                                     </div>
                                     <small>Proses Registrasi <strong>60%</strong> Selesai. Segera lengkapi data dan upload berkas yang diperlukan.</small>
                                 </dd>
                             </dl>
                         </div>
                     </div>
                   </div>
               </div>
          </div>
       </div>
    </div>

    <!-- timeline -->
    <div class="wrapper wrapper-content animated fadeInRight margin-timeline">
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
                       <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                           <div class="vertical-timeline-block">
                               <div class="vertical-timeline-icon blue-bg">
                                   <i class="fa fa-file-text"></i>
                               </div>

                               <div class="vertical-timeline-content">
                                   <h2>Upload Berkas</h2>
                                   <p>Mengupload foto atau scan Surat Delegasi dan Surat Kontingen yang telah ditandatangani oleh Manager Kolat dan sudah sah.
                                   </p>
                                   <a href="{{ route('upload.user') }}" class="btn btn-sm btn-success"> Upload Sekarang</a>
                                   <span class="vertical-date">
                                       Today <br/>
                                       <small>Dec 24</small>
                                   </span>
                               </div>
                           </div>

                           <div class="vertical-timeline-block">
                               <div class="vertical-timeline-icon navy-bg">
                                   <i class="fa fa-users"></i>
                               </div>

                               <div class="vertical-timeline-content">
                                   <h2>Lengkapi Data Atlit</h2>
                                   <p>Melengkapi data Atlit dan Mengupload berkas seperti pas foto, foto atau scan Surat Sehat, Surat Pernyataan, dan kartu identitas </p>
                                   <a href="{{ route('atlit.user') }}" class="btn btn-sm btn-primary"> Lengkapi Sekarang </a>
                                   <span class="vertical-date">
                                       Today <br/>
                                       <small>Dec 24</small>
                                   </span>
                               </div>
                           </div>

                           <div class="vertical-timeline-block">
                               <div class="vertical-timeline-icon lazur-bg">
                                   <i class="fa fa-credit-card"></i>
                               </div>

                               <div class="vertical-timeline-content">
                                   <h2>Pembayaran</h2>
                                   <p>Pembayaran dilakukan dengan transfer sesuai jumlah yang tertera pada payment bill sesuai jumlah atlit yang didaftarkan dan sudah termasuk biaya kontingen dan administrasi. </p>
                                   <a href="{{ route('pembayaran.user') }}" class="btn btn-sm btn-info">Upload Bukti Pembayaran</a>
                                   <span class="vertical-date"> Yesterday <br/><small>Dec 23</small></span>
                               </div>
                           </div>

                           <div class="vertical-timeline-block">
                               <div class="vertical-timeline-icon yellow-bg">
                                   <i class="fa fa-clock-o"></i>
                               </div>

                               <div class="vertical-timeline-content">
                                   <h2>Menunggu Pengumuman Selanjutnya...</h2>
                                   <!-- <p>Tunggu Pengumuman Selanjutnya.</p> -->
                                   <span class="vertical-date">Yesterday <br/><small>Dec 23</small></span>
                               </div>
                           </div>
                       </div>

                   </div>
               </div>
          </div>
       </div>
    </div>
@stop
