@extends('layouts.dashboard')
@extends('user.menu')

@section('title', 'KEJURLAT 2019 | Dashboard User')
@push('styles')
<link href="{{asset('master/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
<link href="{{asset('master/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
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
   <li>
       <a href="{{ route('upload.user') }}"><i class="fa fa-file-text"></i> <span class="nav-label">Upload Berkas</span> <span class="pull-right label label-primary">SPECIAL</span></a>
   </li>
   <li class="active">
       <a href="{{ route('atlit.user') }}"><i class="fa fa-users"></i> <span class="nav-label">Data Atlit </span></a>
   </li>
   <li>
       <a href="{{ route('pembayaran.user') }}"><i class="fa fa-credit-card"></i> <span class="nav-label">Pembayaran</span> <span class="label label-warning pull-right">NEW</span></a>
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
             <li>
                 <a href="{{ route('dashboard.user') }}">Dashboard</a>
             </li>
             <li class="active">
                 <strong>Data Atlit</strong>
             </li>
           </ol>
       </div>
   </div>
   <!-- end breadcrumb -->

   <!-- Modal -->
   <div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content animated fadeIn">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <div class="modal-title">
                     <div class="m-b-xs">
                        <img alt="avatar" class="img-circle" src="http://adisanggoro.sch.id/assets/assets/avatar/avatar.png" style="width: 150px; height: 150px;">
                     </div>
                     <div class="m-b-xs">
                        <label title="Upload image file" for="inputImage" class="btn btn-primary">
                            <input type="file" accept="image/*" name="file" id="inputImage" class="hide">
                            Ubah Foto
                        </label>
                     </div>
                  </div>
               </div>
               <div class="modal-body">
                  <form method="POST" action="{{ route('login') }}" role="form" class="masuk">
                     @csrf
                      <div class="form-group"><label>Nama Lengkap</label> <input type="text" placeholder="Nama Lengkap" value="{{ old('nama') }}" class="form-control email_manager" name="nama" autofocus></div>
                      <div class="form-group">
                        <label>Kategori</label>
                            <select class="select2_demo_1 form-control">
                                <option value="1">Tanding</option>
                                <option value="2">Seni</option>
                                <option value="3">Stamina & Tenaga</option>
                                <option value="4">Tulis</option>
                            </select>
                        </div>
                        <div class="form-group"><label>Berat Badan</label> <input type="number" placeholder="Berat Badan" class="form-control" name="berat_badan"></div>
                      <label>Jenis Kelamin</label><div class="form-group">
                        <div class="radio radio-info radio-inline">
                           <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                           <label for="inlineRadio1"> Laki-Laki </label>
                        </div>
                        <div class="radio radio-danger radio-inline">
                           <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                           <label for="inlineRadio2"> Perempuan </label>
                        </div>
                      </div>
                      <div class="form-group"><label>Alamat Lengkap</label> <textarea placeholder="Alamat Lengkap" class="form-control" name="alamat"></textarea></div>
                      <div class="form-group"><label>Email</label> <input type="email" placeholder="Email" class="form-control password_manager" name="email"></div>
               </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" id="login_button" class="btn btn-primary">Simpan</button>
                     </div>
                  </form>
          </div>
      </div>
   </div>

   <!-- Lihat -->
   <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content animated fadeIn">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <div class="modal-title">
                     <div class="m-b-xs">
                        <img alt="avatar" class="img-circle" src="http://adisanggoro.sch.id/assets/assets/avatar/avatar.png" style="width: 150px; height: 150px;">
                     </div>
                     <div class="m-b-xs">
                        <h3><strong>Muhammad Abdurrahman</strong></h3>
                     </div>
                  </div>
               </div>
               <div class="modal-body">
                      <div class="font-bold"><i class="fa fa-trophy"></i> Kategori Tanding</div>
                      <address class="m-t-md">
                          <strong>Laki-Laki</strong>
                          <p><i class="fa fa-map-marker"></i> Jl. Jambon, Kragilan, Sinduadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284</p>
                          <i class="fa fa-envelope"></i> abran7815@gmail.com
                      </address>
                </div>
            </div>
         </div>
</div>
   <!-- End Modal -->
   <div class="btn-group">
      <button type="submit" id="login_button" class="btn btn-primary">Tambah Atlit</button>
      <button type="submit" id="login_button" class="btn btn-info">Tambah Official</button>
   </div>
   <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
          <div class="col-lg-3">
              <div class="contact-box center-version">

                  <a href="profile.html">
                     <div class="m-b-xs">
                        <img alt="avatar" class="img-circle" src="http://adisanggoro.sch.id/assets/assets/avatar/avatar.png" style="margin-right: -60px;width: 150px; height: 150px;"><span class="pull-right label label-success">Manager</span>
                     </div>
                      <h3 class="m-b-xs"><strong>Muhammad Abdurrahman</strong></h3>

                      <div class="font-bold"><i class="fa fa-trophy"></i> Kategori Tanding</div>
                      <address class="m-t-md">
                          <strong>Laki-Laki</strong><br>
                          <p><i class="fa fa-map-marker"></i> Jl. Jambon, Kragilan, Sinduadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284</p>
                          <i class="fa fa-envelope"></i> abran7815@gmail.com
                      </address>

                  </a>
                  <div class="contact-box-footer">
                      <div class="m-t-xs btn-group">
                          <a class="btn btn-xs btn-white" data-toggle="modal" data-target="#myModal4"><i class="fa fa-edit"></i> Edit </a>
                          <a class="btn btn-xs btn-white" data-toggle="modal" data-target="#myModal5"><i class="fa fa-eye"></i> Lihat</a>
                          <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal4"><i class="fa fa-trash"></i> Hapus</a>
                      </div>
                  </div>

              </div>
          </div>
      </div>
   </div>
@stop
