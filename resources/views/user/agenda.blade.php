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
</div>
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-6">
         <div class="ibox-content inspinia-timeline">
             <div class="timeline-item">
                 <div class="row">
                     <div class="col-xs-3 date">
                         <i class="fa fa-briefcase"></i>
                         {{ date('d-m-Y') }}
                         <br/>
                         <small class="text-navy">Hari Senin</small>
                     </div>
                     <div class="col-xs-7 content no-top-border">
                         <p class="m-b-xs"><strong>Technical Meeting</strong></p>
                         <p>Technical meeting akan dilaksanakan di gedung Grha Sabha Pramana Universitas Gadjah Mada.</p>
                     </div>
                 </div>
             </div>
             <div class="timeline-item">
                 <div class="row">
                     <div class="col-xs-3 date">
                         <i class="fa fa-file-text"></i>
                        {{ date('d-m-Y') }}
                         <br/>
                         <small class="text-navy">Hari Selasa</small>
                     </div>
                     <div class="col-xs-7 content">
                         <p class="m-b-xs"><strong>Pengumpulan Berkas</strong></p>
                         <p>Pengumpulan Surat Delagasi dan surat pernyataan di di Gelanggang Mahasiswa Universitas Gadjah Mada.</p>
                     </div>
                 </div>
             </div>
             <div class="timeline-item">
                 <div class="row">
                     <div class="col-xs-3 date">
                         <i class="fa fa-coffee"></i>
                         {{ date('d-m-Y') }}
                         <br/>
                         <small class="text-navy">Hari Rabu</small>
                     </div>
                     <div class="col-xs-7 content">
                         <p class="m-b-xs"><strong>Briefing Acara</strong></p>
                         <p>
                             Panitia Melakukan briefing untuk mempersiapkan alat alat dan akomodasi untuk acara.
                         </p>
                     </div>
                 </div>
             </div>
             <div class="timeline-item">
                 <div class="row">
                     <div class="col-xs-3 date">
                         <i class="fa fa-phone"></i>
                         {{ date('d-m-Y') }}
                         <br/>
                         <small class="text-navy">Hari Minggu</small>
                     </div>
                     <div class="col-xs-7 content">
                         <p class="m-b-xs"><strong>Hari PERTANDINGAN</strong></p>
                         <p>
                             Hari PERTANDINGAN.
                         </p>
                     </div>
                 </div>
             </div>
         </div>
      </div>
      <div class="col-lg-6">
           <div class="ibox-content">
               <div id="calendar"></div>
           </div>
       </div>
   </div>
</div>

@stop
@push('scripts')
<!-- Full Calendar -->
<script src="{{ asset('master/js/plugins/fullcalendar/moment.min.js') }}"></script>
<script src="{{ asset('master/js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>

<script>
    $(document).ready(function() {
        /* initialize the calendar
         -----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true,
            events: [
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ]
        });


    });

</script>
@endpush
