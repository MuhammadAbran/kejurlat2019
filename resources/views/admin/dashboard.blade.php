@extends('layouts.dashboard')
@extends('admin.menu')

@section('title', 'KEJURLAT 2019 | Dashboard')
@section('menus')
   <li class="active">
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
   <li>
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
<div class="wrapper wrapper-content">
   <div class="row">
               <div class="col-lg-4">
                   <div class="ibox float-e-margins">
                       <div class="ibox-title">
                           <span class="label label-success pull-right"><i class="fa fa-clock-o"> {{ date('d.m.Y') }}</i></span>
                           <h5>Pembayaran</h5>
                       </div>
                       <div class="ibox-content">
                           <h1 class="no-margins">Rp. 2.000.000</h1>
                           <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                           <small>Total Pemasukkan</small>
                       </div>
                   </div>
               </div>
               <div class="col-lg-2">
                   <div class="ibox float-e-margins">
                       <div class="ibox-title">
                           <span class="label label-info pull-right"><i class="fa fa-clock-o"> {{ date('d.m.Y') }}</i></span>
                           <h5>Tanding</h5>
                       </div>
                       <div class="ibox-content">
                           <h1 class="no-margins">28</h1>
                           <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                           <small>Total atlit tanding</small>
                       </div>
                   </div>
               </div>
               <div class="col-lg-2">
                   <div class="ibox float-e-margins">
                       <div class="ibox-title">
                           <span class="label label-primary pull-right"><i class="fa fa-clock-o"> {{ date('d.m.Y') }}</i></span>
                           <h5>Seni</h5>
                       </div>
                       <div class="ibox-content">
                           <h1 class="no-margins">19</h1>
                           <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> -->
                           <small>Total atlit seni</small>
                       </div>
                   </div>
               </div>
               <div class="col-lg-2">
                   <div class="ibox float-e-margins">
                       <div class="ibox-title">
                           <span class="label label-danger pull-right"><i class="fa fa-clock-o"> {{ date('d.m.Y') }}</i></span>
                           <h5>STAGA</h5>
                       </div>
                       <div class="ibox-content">
                           <h1 class="no-margins">9</h1>
                           <!-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> -->
                           <small>Total Atlit STAGA</small>
                       </div>
                   </div>
               </div>
                <div class="col-lg-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-danger pull-right"><i class="fa fa-clock-o"> {{ date('d.m.Y') }}</i></span>
                            <h5>Tulis</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">3</h1>
                            <!-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> -->
                            <small>Total Atlit tulis</small>
                        </div>
                    </div>
                 </div>
     </div>

     <div class="row">
         <div class="col-lg-12">
             <div class="ibox float-e-margins">
                 <div class="ibox-content">
                     <div>
                             <span class="pull-right text-right">
                             <small>Jumlah dan total atlit dari kolat : <strong>Daerah Istimewa Yogyakarta</strong></small>
                                 <br/>
                                 Jumlah Kolat: 12
                             </span>
                         <h3 class="font-bold no-margins">
                             Total Atlit yang terdaftar
                         </h3>
                         <small>Database.</small>
                     </div>

                     <div class="m-t-sm">

                         <div class="row">
                             <div class="col-md-8">
                                <div>
                                   <canvas id="barChart" height="140"></canvas>
                                </div>
                             </div>
                             <div class="col-md-4">
                                 <ul class="stat-list m-t-lg">
                                     <li>
                                         <h2 class="no-margins">12</h2>
                                         <small>Total Kolat yang terdaftar</small>
                                         <div class="progress progress-mini">
                                             <div class="progress-bar" style="width: 48%;"></div>
                                         </div>
                                     </li>
                                     <li>
                                         <h2 class="no-margins ">130</h2>
                                         <small>Total Atlit yang terdaftar</small>
                                         <div class="progress progress-mini">
                                             <div class="progress-bar" style="width: 60%;"></div>
                                         </div>
                                     </li>
                                 </ul>
                             </div>
                         </div>

                     </div>

                     <div class="m-t-md">
                         <small class="pull-right">
                             <i class="fa fa-clock-o"> </i>
                             Terakhir di perbarui {{ date('d.m.Y') }}
                         </small>
                         <small>
                             <strong>Analisis Jumlah Peserta:</strong> data ini diambil dari database, dan di tampilkan di dashboard sebagai informasi.
                         </small>
                     </div>

                 </div>
             </div>
         </div>
     </div>

     <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Timeline</h5>
                    <span class="label label-primary">KEJURLAT 2019</span>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>

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
        </div>
        <div class="col-lg-6">
           <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Progress Pendaftaran KOLAT</h5>
                    <div class="ibox-tools">
                       <a class="collapse-link">
                           <i class="fa fa-chevron-up"></i>
                       </a>
                       <a class="close-link">
                           <i class="fa fa-times"></i>
                       </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover no-margins">
                       <thead>
                       <tr>
                           <th width=20%>Tanggal</th>
                           <th width=40%>Nama Manager</th>
                           <th width=30%>KOLAT</th>
                           <th width=10%>Status</th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <td><i class="fa fa-clock-o"></i> 10 maret</td>
                           <td class="text-success"> <i class="fa fa-user"></i> Muhammad farhan nurhadi aldo </td>
                           <td class="text-navy">UGM</td>
                           <td><span class="label label-primary">Belum Membayar</span> </td>
                       </tr>
                       <tr>
                           <td><i class="fa fa-clock-o"></i> 10:40am</td>
                           <td class="text-success"> <i class="fa fa-user"></i> Muhammad Agung </td>
                           <td class="text-navy">MAN 2 Sleman</td>
                           <td><span class="label label-success">Registered</span> </td>
                       </tr>
                       <tr>
                           <td><i class="fa fa-clock-o"></i> 10:40am</td>
                           <td class="text-success"> <i class="fa fa-user"></i> Firdaus MH </td>
                           <td class="text-navy">Universitas Islam Negri</td>
                           <td><span class="label label-warning">Konfirmasi bayar</span> </td>
                       </tr>
                       </tbody>
                    </table>
                </div>
           </div>
        </div>
     </div>
</div>
@stop
@push('scripts')

<!-- ChartJS-->
<script src="{{ asset('master/js/plugins/chartJs/Chart.min.js') }}"></script>
<script>
   $(function () {

   var barData = {
        labels: ["Tanding", "Seni", "STAGA", "Tulis", "Total"],
        datasets: [
            {
                label: "Data Atlit",
                fillColor: "#ff3f34",
                strokeColor: "#c0392b",
                highlightFill: "#c0392b",
                highlightStroke: "#fff",
                data: [{{ 10 }}, {{ 30 }}, {{ 12 }}, {{ 48 }}, {{ 70 }}]
            }
        ]
   };

   var barOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 40,
        barDatasetSpacing: 1,
        responsive: true
   }


   var ctx = document.getElementById("barChart").getContext("2d");
   var myNewChart = new Chart(ctx).Bar(barData, barOptions);
   });
</script>
@endpush
