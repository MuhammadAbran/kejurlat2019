@extends('layouts.dashboard')
@extends('admin.menu')

@section('title', 'KEJURLAT 2019 | Dashboard User')
@push('styles')
<link href="{{asset('master/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
<link href="{{asset('master/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
<link href="{{ asset('master/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endpush
@section('menus')
   <li>
       <a href="{{ route('dashboard.admin') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
   </li>
   <li class="active">
       <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Data Kolat</span><span class="fa arrow"></span></a>
       <ul class="nav nav-second-level collapse">
          @foreach($user as $kolat)
            @if(!$kolat->role)
               <li class="{{ last(request()->segments()) == $kolat->id ? 'active' : '' }}"><a href="{{ route('kolat.admin', $kolat->id) }}">KOLAT {{ $kolat->nama_instansi }}</a></li>
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
<!-- breadcrumb -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-8">
      @foreach($user as $kolat)
        @if(!$kolat->role && $kolat->id == last(request()->segments()))
           <h2>Data Atlit | KOLAT {{ $kolat->nama_instansi }}</h2>
        @endif
      @endforeach
        <ol class="breadcrumb">
           <li>
               <a href="{{ route('dashboard.admin') }}">Dashboard</a>
           </li>
           <li class="active">
               <strong>Data Kolat</strong>
           </li>
        </ol>
   </div>
   <div class="col-lg-4">
        <div class="title-action animated fadeInRight">
            <a href="#" class="btn btn-white" data-toggle="modal" data-target="#tambah_official"><i class="fa fa-plus"></i> Tambah Official </a>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambah_atlit"><i class="fa fa-plus"></i> Tambah Atlit </a>
        </div>
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

<!-- Tambah Official -->
<div class="modal inmodal" id="tambah_official" tabindex="-1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content animated fadeIn">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               <div class="modal-title">
                  <div class="m-b-xs">
                     <img alt="avatar" class="img-circle" src="https://pbs.twimg.com/profile_images/909399057/Lambang_MP_400x400.jpg" style="width: 150px; height: 150px;">
                  </div>
                  <div class="m-b-xs">
                     <label title="Upload image file" for="inputImage" class="btn btn-primary">
                         <input type="file" accept="image/*" name="file" id="inputImage" class="hide">
                         Upload Foto
                     </label>
                  </div>
               </div>
            </div>
            <div class="modal-body">
               <form method="POST" action="{{ route('login') }}" role="form" class="masuk">
                  @csrf
                   <div class="form-group"><label>Nama Lengkap</label> <input type="text" placeholder="Nama Lengkap" value="{{ old('nama') }}" class="form-control email_manager" name="nama" autofocus></div>
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

<!-- Tambah Atlit -->
<div class="modal inmodal" id="tambah_atlit" tabindex="-1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content animated fadeIn">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               <div class="modal-title">
                  <div class="m-b-xs">
                     <img alt="avatar" class="img-circle" src="https://pbs.twimg.com/profile_images/909399057/Lambang_MP_400x400.jpg" style="width: 150px; height: 150px;">
                  </div>
                  <div class="m-b-xs">
                     <label title="Upload image file" for="inputImage" class="btn btn-primary">
                         <input type="file" accept="image/*" name="file" id="inputImage" class="hide">
                         Upload Foto
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
   <!-- End Modal -->


   <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
          <div class="col-lg-3">
              <div class="contact-box center-version">

                  <a href="profile.html">
                     <div class="m-b-xs">
                        <img alt="avatar" class="img-circle" src="http://adisanggoro.sch.id/assets/assets/avatar/avatar.png" style="margin-right: -60px;width: 150px; height: 150px;"><span class="pull-right label label-success">Manager</span>
                     </div>
                      <h3 class="m-b-xs"><strong>{{ Auth::user()->nama_manager }}</strong></h3>

                      <div class="font-bold"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Manager Kolat {{ Auth::user()->nama_instansi }}</div>
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
                      </div>
                  </div>

              </div>
          </div>

          <div class="col-lg-3">
              <div class="contact-box center-version">

                  <a href="profile.html">
                     <div class="m-b-xs">
                        <img alt="avatar" class="img-circle" src="http://adisanggoro.sch.id/assets/assets/avatar/avatar.png" style="margin-right: -60px;width: 150px; height: 150px;"><span class="pull-right label" style="background-color: white; border: 0.5px solid darkgrey">Official</span>
                     </div>
                      <h3 class="m-b-xs"><strong>Muhammad Agung</strong></h3>

                      <div class="font-bold"><i class="fa fa-trophy"></i> Official Kolat {{ Auth::user()->nama_instansi }}</div>
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
                          <a class="btn btn-xs btn-primary delete_user"><i class="fa fa-trash"></i> Hapus</a>
                      </div>
                  </div>

              </div>
          </div>

          <div class="col-lg-3">
              <div class="contact-box center-version">

                  <a href="profile.html">
                     <div class="m-b-xs">
                        <img alt="avatar" class="img-circle" src="http://adisanggoro.sch.id/assets/assets/avatar/avatar.png" style="margin-right: -60px;width: 150px; height: 150px;"><span class="pull-right label label-primary">Atlit</span>
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
                          <a class="btn btn-xs btn-primary delete_user"><i class="fa fa-trash"></i> Hapus</a>
                      </div>
                  </div>

              </div>
          </div>

          <div class="col-lg-3">
              <div class="contact-box center-version">

                  <a href="profile.html">
                     <div class="m-b-xs">
                        <img alt="avatar" class="img-circle" src="http://adisanggoro.sch.id/assets/assets/avatar/avatar.png" style="margin-right: -60px;width: 150px; height: 150px;"><span class="pull-right label label-primary">Atlit</span>
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
                          <a class="btn btn-xs btn-primary delete_user" ><i class="fa fa-trash"></i> Hapus</a>
                      </div>
                  </div>

              </div>
          </div>

          <div class="col-lg-3">
              <div class="contact-box center-version">

                  <a href="profile.html">
                     <div class="m-b-xs">
                        <img alt="avatar" class="img-circle" src="http://adisanggoro.sch.id/assets/assets/avatar/avatar.png" style="margin-right: -60px;width: 150px; height: 150px;"><span class="pull-right label label-primary">Atlit</span>
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
                          <a class="btn btn-xs btn-primary delete_user"><i class="fa fa-trash"></i> Hapus</a>
                      </div>
                  </div>

              </div>
          </div>
   </div>
</div>
@stop

@push('scripts')
<!-- SWAL -->
<script src="{{ asset('master/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

<script>
   $(document).ready(function(){
      $('.delete_user').click(function () {
          swal({
                      title: "Anda Yakin?",
                      text: "Data yang sudah dihapus tidak dapat dikembalikan lagi!",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Ya, Hapus!",
                      cancelButtonText: "Tidak!",
                      closeOnConfirm: false,
                      closeOnCancel: false },
                  function (isConfirm) {
                      if (isConfirm) {
                          swal("Dihapus!", "Data yang anda pilih berhasil dihapus!.", "success");
                      } else {
                          swal("Dibatalkan", "Data yang anda pilih Tidak Jadi Dihapus", "error");
                      }
                  });
      });
   });
</script>
@endpush
