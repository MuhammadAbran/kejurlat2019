@extends('layouts.dashboard')
@extends('user.menu')

@section('title', 'KEJURLAT 2019 | Dashboard User')
@push('styles')
<meta name="csrf" content="{{ csrf_token() }}">
<link href="{{asset('master/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
<link href="{{asset('master/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
<link href="{{ asset('master/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
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
   <li>
       <a href="{{ route('upload.user') }}"><i class="fa fa-file-text"></i> <span class="nav-label">Upload Berkas</span> <span class="pull-right label label-primary" style="display: {{ Auth::user()->progress >= 30 ? 'none' : '' }}">!</span></a>
   </li>
   <li class="active" style="display: {{ Auth::user()->progress < 30 ? 'none' : '' }}">
       <a href="{{ route('atlit.user') }}"><i class="fa fa-users"></i> <span class="nav-label">Data Atlit </span></a>
   </li>
   <li style="display: {{ Auth::user()->progress < 60 ? 'none' : '' }}">
       <a href="{{ route('pembayaran.user') }}"><i class="fa fa-credit-card"></i> <span class="nav-label">Pembayaran</span> <span class="label label-success pull-right" style="display: {{ Auth::user()->progress > 75 ? 'none' : '' }}">!</span></a>
   </li>
   <li>
       <a href="{{ route('pengumuman.user') }}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Pengumuman</span></a>
   </li>
@stop
@section('content')
@if(Auth::user()->progress < 30)
   <div style="display: {{ Auth::user()->progress < 30 ? '' : 'none' }}">
      <div class="middle-box text-center animated fadeInDown">
         <h1>404</h1>
         <h3 class="font-bold">Halaman Tidak Ditemukan</h3>

         <div class="error-desc">
              Maaf, Halaman yang anda akses tidak kami temukan coba perikas kembali URL yang anda request atau menekan refresh button, atau coba lagi nanti.<br><br>
                  <button type="button" onclick="window.history.back()" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</button>
         </div>
      </div>
   </div>
@else
      <!-- breadcrumb -->
      <div class="row wrapper border-bottom white-bg page-heading">
         <div class="col-lg-8">
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
         <div class="col-lg-4">
              <div class="title-action animated fadeInRight">
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambah_atlit" style="display: {{ Auth::user()->progress >= 60 ? 'none' : '' }}"><i class="fa fa-plus"></i> Atlit </a>
                  <a href="#" class="btn btn-white" data-toggle="modal" data-target="#tambah_official" style="display: {{ Auth::user()->progress >= 60 ? 'none' : '' }}"><i class="fa fa-plus"></i> Official </a>
                  <a href="#" data-atlit="{{ Auth::user()->progress >= 60 || $catlit <= 1 ? 0 : 1 }}" data-id="{{ Auth::user()->id }}" class="btn btn-warning kunci_data" {{ Auth::user()->progress >= 60 || $catlit <= 1 ? 'disabled' : '' }}><i class="fa fa-lock"></i> {{ Auth::user()->progress >= 60 ? 'Terkunci' : 'Kunci Data' }} </a>
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
                        <form method="POST" action="{{ route('edit.atlit') }}" role="form">
                           @csrf
                           <input type="hidden" id="aidi" name="id" value="">
                           <div class="form-group"><label>Nama Lengkap</label> <input type="text" id="nama_atlit" placeholder="Nama Lengkap" value="" class="form-control" name="nama" autofocus></div>
                            <div class="form-group"><label>Tanggal Lahir</label> <input type="date" id="tgl_lahir" class="form-control" name="tgl_lahir"></div>
                            <div class="form-group">
                              <label>Kategori</label>
                                  <select class="select2_demo_1 form-control" id="kategori" name="kategori">
                                      <option value="Tanding">Tanding</option>
                                      <option value="Seni">Seni</option>
                                      <option value="Stamina & Tenaga">Stamina & Tenaga</option>
                                      <option value="Tulis">Tulis</option>
                                  </select>
                              </div>
                              <div class="form-group"><label>Berat Badan</label> <input type="number" id="berat_badan" placeholder="Berat Badan" class="form-control" name="berat_badan"></div>
                            <label>Jenis Kelamin</label><div class="form-group">
                              <div class="radio radio-info radio-inline">
                                 <input type="radio" id="inlineRadio1" value="Laki-Laki" class="jk" name="gender" checked="">
                                 <label for="inlineRadio1"> Laki-Laki </label>
                              </div>
                              <div class="radio radio-danger radio-inline">
                                 <input type="radio" id="inlineRadio2" value="Perempuan" class="jk" name="gender">
                                 <label for="inlineRadio2"> Perempuan </label>
                              </div>
                            </div>
                            <div class="form-group"><label>Alamat Lengkap</label> <textarea placeholder="Alamat Lengkap" id="alamat_" class="form-control" name="alamat"></textarea></div>
                            <div class="form-group"><label>Email</label> <input type="email" placeholder="Email" id="email_" class="form-control" name="email"></div>
                     </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                              <button type="submit" id="login_button" class="btn btn-primary">Update</button>
                           </div>
                        </form>
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
                           <form action="{{ route('tambah.official') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                  <input type="file" accept="image/*" name="file" id="inputImage" class="hide">
                                  Upload Foto
                              </label>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="modal-body">
                     <form method="POST" action="{{ route('tambah.official') }}">
                        @csrf
                         <div class="form-group"><label>Nama Lengkap</label> <input type="text" placeholder="Nama Lengkap" value="{{ old('nama') }}" class="form-control email_manager" name="nama" autofocus></div>
                         <div class="form-group"><label>Tanggal Lahir</label> <input type="date" class="form-control" name="tgl_lahir"></div>
                         <label>Jenis Kelamin</label><div class="form-group">
                           <div class="radio radio-info radio-inline">
                              <input type="radio" id="inlineRadio1" value="Laki-Laki" name="gender" checked="">
                              <label for="inlineRadio1"> Laki-Laki </label>
                           </div>
                           <div class="radio radio-danger radio-inline">
                              <input type="radio" id="inlineRadio2" value="Perempuan" name="gender">
                              <label for="inlineRadio2"> Perempuan </label>
                           </div>
                         </div>
                         <div class="form-group"><label>Alamat Lengkap</label> <textarea placeholder="Alamat Lengkap" class="form-control" name="alamat"></textarea></div>
                         <div class="form-group"><label>Email</label> <input type="email" placeholder="Email" class="form-control password_manager" name="email"></div>
                  </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                           <button type="submit" id="" class="btn btn-primary">Simpan</button>
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
                           <img id="remove_img" alt="avatar" class="img-circle" src="https://pbs.twimg.com/profile_images/909399057/Lambang_MP_400x400.jpg" style="width: 150px; height: 150px;">
                           <span id="uploading"></span>
                        </div>
                        <div class="m-b-xs">
                                  <input type="file" name="avatar" id="avatar" style="display: none">
                                  <button class="ladda-button btn btn-primary ladda-btn" type="button" id="btn-ck" data-style="zoom-in">Upload Foto</button>
                        </div>
                     </div>
                  </div>
                  <div class="modal-body">
                     <form method="POST" action="{{ route('tambah.atlit') }}">
                        @csrf
                         <div class="form-group"><label>Nama Lengkap</label> <input type="text" placeholder="Nama Lengkap" value="{{ old('nama') }}" class="form-control" name="nama" autofocus></div>
                         <div class="form-group"><label>Tanggal Lahir</label> <input type="date" class="form-control" name="tgl_lahir"></div>
                         <div class="form-group">
                           <label>Kategori</label>
                               <select class="select2_demo_1 form-control" name="kategori">
                                   <option value="Tanding">Tanding</option>
                                   <option value="Seni">Seni</option>
                                   <option value="Stamina & Tenaga">Stamina & Tenaga</option>
                                   <option value="Tulis">Tulis</option>
                               </select>
                           </div>
                           <div class="form-group"><label>Berat Badan</label> <input type="number" placeholder="Berat Badan" class="form-control" name="berat_badan"></div>
                         <label>Jenis Kelamin</label><div class="form-group">
                            <div class="radio radio-info radio-inline">
                              <input type="radio" id="inlineRadio1" value="Laki-Laki" name="gender" checked="">
                              <label for="inlineRadio1"> Laki-Laki </label>
                           </div>
                           <div class="radio radio-danger radio-inline">
                              <input type="radio" id="inlineRadio2" value="Perempuan" name="gender">
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


         <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact-box center-version">

                        <a href="#"  data-toggle="modal" data-target="#myModal5" style="min-height: 400px">
                           <div class="m-b-xs">
                              <img alt="avatar" class="img-circle" src="{{ url('storage/avatars/' . Auth::user()->avatar) }}" style="margin-right: -60px;width: 150px; height: 150px;"><span class="pull-right label label-success">Manager</span>
                           </div>
                            <h3 class="m-b-xs"><strong>{{ Auth::user()->nama_manager }}</strong></h3>

                            <div class="font-bold"><i class="fa fa-user" aria-hidden="true"></i> Manager Kolat {{ Auth::user()->nama_instansi }}</div>
                            <address class="m-t-md">
                              <i class="fa fa-envelope"></i> {{ Auth::user()->email_manager }}
                            </address>
                        </a>
                        <div class="contact-box-footer">
                            <div class="m-t-xs btn-group">
                                <a class="btn btn-xs btn-white" data-toggle="modal" data-target="#myModal4" style="display: {{ Auth::user()->progress >= 60 ? 'none' : 'block' }}"><i class="fa fa-edit"></i> Edit </a>
                                <a class="btn btn-xs btn-white" data-toggle="modal" data-target="#myModal5"><i class="fa fa-eye"></i> Lihat</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Official -->
                @foreach( $offs as $off )
                <div class="col-lg-3">
                    <div class="contact-box center-version">

                        <a data-id="{{ $off->id }}" data-toggle="modal" data-target="#myModal5" style="min-height: 400px">
                           <div class="m-b-xs">
                              <img alt="avatar" class="img-circle" src="{{ url('storage/avatars/' . Auth::user()->avatar) }}" style="margin-right: -60px;width: 150px; height: 150px;"><span class="pull-right label" style="background-color: white; border: 0.5px solid darkgrey">Official</span>
                           </div>
                            <h3 class="m-b-xs"><strong>{{ $off->nama }}</strong></h3>
                            <div class="font-bold"><i class="fa fa-users"></i> Official Kolat {{ Auth::user()->nama_instansi }}</div>
                            <address class="m-t-md">
                                <strong>{{ $off->gender }}</strong><br>
                                <i class="fa fa-calendar"></i> <small>{{ $off->tgl_lahir }}</small><br>
                                <p><i class="fa fa-map-marker"></i> {{ $off->alamat }}</p>
                                <i class="fa fa-envelope"></i> {{ $off->email }}
                            </address>
                        </a>
                        <div class="contact-box-footer">
                            <div class="m-t-xs btn-group">
                                <a data-id="{{ $off->id }}" class="btn btn-xs btn-white" data-toggle="modal" data-target="#myModal4" style="display: {{ Auth::user()->progress >= 60 ? 'none' : 'block' }}"><i class="fa fa-edit"></i> Edit </a>
                                <a data-id="{{ $off->id }}" class="btn btn-xs btn-white" data-toggle="modal" data-target="#myModal5"><i class="fa fa-eye"></i> Lihat</a>
                                <a data-id="{{ $off->id }}" class="btn btn-xs btn-primary delete_off" style="display: {{ Auth::user()->progress >= 60 ? 'none' : 'block' }}"><i class="fa fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- End Official -->

                <!-- Atlit -->
                @foreach( $atlits as $atlit )
                <div class="col-lg-3">
                    <div class="contact-box center-version">

                        <a data-toggle="modal" data-target="#myModal5" style="min-height: 400px">
                           <div class="m-b-xs">
                              <img alt="avatar" class="img-circle" src="{{ url('storage/avatars/' . Auth::user()->avatar) }}" style="margin-right: -60px;width: 150px; height: 150px;"><span class="pull-right label label-primary">Atlit</span>
                           </div>
                            <h3 class="m-b-xs"><strong>{{ $atlit->nama }}</strong></h3>

                            <div class="font-bold"><i class="fa fa-trophy"></i> Kategori {{ $atlit->kategori['kategori'] }}</div>
                            <address class="m-t-md">
                                <strong>{{ $atlit->gender }}</strong><br>
                                <small><i class="fa fa-calendar"></i> {{ $atlit->tgl_lahir }}</small><br>
                                <p><i class="fa fa-map-marker"></i> {{ $atlit->alamat }}</p>
                                <i class="fa fa-envelope"></i> {{ $atlit->email }}
                            </address>
                        </a>
                        <div class="contact-box-footer">
                            <div class="m-t-xs btn-group">
                                <a data-id="{{ $atlit->id }}" class="btn btn-xs btn-white edit_atlit" data-toggle="modal" data-target="#myModal4" style="display: {{ Auth::user()->progress >= 60 ? 'none' : 'block' }}"><i class="fa fa-edit"></i> Edit </a>
                                <a class="btn btn-xs btn-white" data-toggle="modal" data-target="#myModal5"><i class="fa fa-eye"></i> Lihat</a>
                                <a data-id="{{ $atlit->id }}" class="btn btn-xs btn-primary delete_atlit" style="display: {{ Auth::user()->progress >= 60 ? 'none' : 'block' }}"><i class="fa fa-trash"></i> Hapus</a>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
                <!-- End Atlit -->
         </div>
      </div>
@endif
@stop

@push('scripts')
@if(Session::has('atlit'))
<script>
   $(document).ready(function() {
       toastr.options = {
           closeButton: true,
           progressBar: true,
           preventDuplicates: true,
           positionClass: 'toast-top-right',
       };
       toastr.success('{{ Session::get('atlit') }}', 'Berhasil!');

   });
</script>
@endif
<!-- SWAL -->
<script src="{{ asset('master/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<!-- Ladda -->
<script src="{{ asset('master/js/plugins/ladda/spin.min.js') }}"></script>
<script src="{{ asset('master/js/plugins/ladda/ladda.min.js') }}"></script>
<script src="{{ asset('master/js/plugins/ladda/ladda.jquery.min.js') }}"></script>

<script>
   $(document).ready(function(){
      $('#btn-ck').on('click', function(){
         $('#avatar').click();
      });


      // Upload Images
      $(document).on('change', '#avatar', function(event){
         event.preventDefault();
         var property = $('#avatar')[0].files;
         var image_name = property[0].name;
         var image_extension = image_name.split('.').pop().toLowerCase();
         console.log(property[0]);
         if (property[0].size > 2000000) {
            swal("ERROR!", "Ukuran Foto Terlalu Besar!", "error");
         }else {
            var form_data = new FormData();
            form_data.append("file", property[0]);
            $.ajax({
               url: "{{ route('foto.atlit') }}",
               method: "POST",
               data: form_data,
               headers: {
                  "X-CSRF-TOKEN": $('meta[name=csrf]').attr('content')
               },
               contentType: false,
               cache: false,
               processData: false,
               beforeSend: function(){
                  // var ladda = $( '.ladda-btn' ).ladda();
                  // ladda.ladda( 'start' );
               },
               success: function(data){
                  // setTimeout(function(){
                  //      ladda.ladda( 'stop' );
                  //  },1000);
                  swal("Berhasil!", "Berhasil Diupload!.", "success");
                  $('#uploading').html(data);
                  $('#remove_img').css('display', 'none');
               },
               error: function(error){
                  swal("ERROR!", error.statusText, "error");
                  console.log(error.statusText);
               }
            });
         }
      });

      //kunci Data
      $('.kunci_data').click(function () {
         var user_id = $(this).data('id');
         if ($(this).data('atlit')) {
            swal({
                       title: "Anda Yakin?",
                       text: "Data yang sudah dikunci tidak dapat dikembalikan lagi!",
                       type: "warning",
                       showCancelButton: true,
                       confirmButtonColor: "#DD6B55",
                       confirmButtonText: "Ya, Kunci!",
                       cancelButtonText: "Tidak!",
                       closeOnConfirm: false,
                       closeOnCancel: false },
                   function (isConfirm) {
                       if (isConfirm) {
                         $.ajax({
                            url: "{{ route('kunci.atlit') }}",
                            method: "POST",
                            headers: {
                              "X-CSRF-TOKEN": $('meta[name=csrf]').attr('content')
                            },
                            data: { id: user_id },
                            success: function(){
                                 swal("DiKunci!", "Data berhasil dikunci!.", "success");
                                 setTimeout(function(){
                                    window.location.href = "{{ route('dashboard.user') }}";
                                 }, 1500);
                            },
                            error: function(e){
                               console.error(e);
                               swal("Error", "Hubungi Administrator untuk Solusi Lebih lanjut.", "error");
                            }
                         });
                       } else {
                           swal("Dibatalkan", "Data Tidak Jadi Dikunci", "error");
                       }
                   });
         }
      });

      //Edit Atlit
      $('.edit_atlit').click(function () {
         var atlit_id = $(this).data('id');
               $.ajax({
                  url: "{{ route('edit.data.atlit') }}",
                  method: "POST",
                  headers: {
                     "X-CSRF-TOKEN": $('meta[name=csrf]').attr('content')
                  },
                  data: { id: atlit_id },
                  success: function(data){
                     $('#aidi').val(atlit_id);
                     $('#nama_atlit').val(data[0].nama);
                     $('#kategori').val(data[0].kategori.kategori);
                     if ($('.jk').val(data[0].gender)) {
                        $('.jk').prop('checked', true);
                     }else {
                        $('.jk').prop('checked', false);
                     }
                     $('#tgl_lahir').val(data[0].tgl_lahir);
                     $('#berat_badan').val(data[0].berat_badan);
                     $('#alamat_').val(data[0].alamat);
                     $('#email_').val(data[0].email);
                     console.log(data);
                  },
                  error: function(){
                     swal("ERROR", "Terjadi kesalahan pada saat menghapus data!", "error");
                  }
               });
      });

      //Delete Atlit
      $('.delete_atlit').click(function () {
         var atlit_id = $(this).data('id');
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
                           $.ajax({
                              url: "{{ route('del.atlit') }}",
                              method: "POST",
                              headers: {
                                 "X-CSRF-TOKEN": $('meta[name=csrf]').attr('content')
                              },
                              data: { id: atlit_id },
                              success: function(){
                                 swal("Dihapus!", "Data yang anda pilih berhasil dihapus!.", "success");
                                 setTimeout(function(){
                                    window.location.reload();
                                 }, 1500);
                              },
                              error: function(){
                                 swal("ERROR", "Terjadi kesalahan pada saat menghapus data!", "error");
                              }
                           });
                      } else {
                          swal("Dibatalkan", "Data yang anda pilih Tidak Jadi Dihapus", "error");
                      }
                  });
      });

      //Delete Official
      $('.delete_off').click(function () {
         var off_id = $(this).data('id');
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
                           $.ajax({
                              url: "{{ route('del.official') }}",
                              method: "POST",
                              headers: {
                                 "X-CSRF-TOKEN": $('meta[name=csrf]').attr('content')
                              },
                              data: { id: off_id },
                              success: function(){
                                 swal("Dihapus!", "Data yang anda pilih berhasil dihapus!.", "success");
                                 setTimeout(function(){
                                    window.location.reload();
                                 }, 1500);
                              },
                              error: function(){
                                 swal("ERROR", "Terjadi kesalahan pada saat menghapus data!", "error");
                              }
                           });
                      } else {
                          swal("Dibatalkan", "Data yang anda pilih Tidak Jadi Dihapus", "error");
                      }
                  });
      });

   });
</script>
@endpush
