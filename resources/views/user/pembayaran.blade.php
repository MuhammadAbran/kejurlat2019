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
       <a href="{{ route('agenda.user') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Agenda</span></a>
   </li>
   <li>
       <a href="{{ route('upload.user') }}"><i class="fa fa-file-text"></i> <span class="nav-label">Upload Berkas</span> <span class="pull-right label label-primary" style="display: {{ Auth::user()->progress >= 30 ? 'none' : '' }}">!</span></a>
   </li>
   <li style="display: {{ Auth::user()->progress < 30 ? 'none' : '' }}">
       <a href="{{ route('atlit.user') }}"><i class="fa fa-users"></i> <span class="nav-label">Data Atlit </span></a>
   </li>
   <li class="active" style="display: {{ Auth::user()->progress < 60 ? 'none' : '' }}">
       <a href="{{ route('pembayaran.user') }}"><i class="fa fa-credit-card"></i> <span class="nav-label">Pembayaran</span> <span class="label label-success pull-right" style="display: {{ Auth::user()->progress > 75 ? 'none' : '' }}">!</span></a>
   </li>
   <li>
       <a href="{{ route('pengumuman.user') }}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Pengumuman</span></a>
   </li>
@stop

@section('content')

   @if(Auth::user()->progress < 60)
   <div class="middle-box text-center animated fadeInDown">
      <h1>404</h1>
      <h3 class="font-bold">Halaman Tidak Ditemukan</h3>

      <div class="error-desc">
           Maaf, Halaman yang anda akses tidak kami temukan coba perikas kembali URL yang anda request atau menekan refresh button, atau coba lagi nanti.<br><br>
               <button type="button" onclick="window.history.back()" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
   </div>
   <div style="display: none">
      {{ $total = 1 }}
      {{ $sub = 1 }}
      {{ $adm = 1 }}
   </div>
   @else
   <!-- breadcrumb -->
   <div class="row wrapper border-bottom white-bg page-heading">
       <div class="col-lg-10">
           <h2>Upload Berkas | KOLAT {{ Auth::user()->nama_instansi }}</h2>
           <ol class="breadcrumb">
               <li>
                   <a href="{{ route('dashboard.user') }}">Dashboard</a>
               </li>
               <li class="active">
                   <strong>Pembayaran</strong>
               </li>
           </ol>
       </div>
   </div>

   <!-- Modal Pembayaran -->
   <div class="modal inmodal" id="pembayaran" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm-6">
      <div class="modal-content animated bounceInRight">
         <form action="{{ route('pembayaran.upload') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h3><i class="fa fa-dollar"></i> Upload Bukti Pembayaran</h3>
               </div>
               <div class="modal-body">
                    <div class="form-group">
                       <label><i class="fa fa-credit-card"></i> Rekening</label>
                       <div class="input-group m-b">
                          <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                          <input type="text" value="A.n Muhammad Abdurrahman" class="form-control" disabled>
                       </div>
                       <div class="input-group m-b">
                          <span class="input-group-addon"><i class="fa fa-bank"></i> </span>
                          <input type="text" value="BCA" class="form-control" disabled>
                       </div>
                       <label>Jumlah Transfer</label>
                       <div class="input-group m-b">
                          <span class="input-group-addon">Rp. </span>
                          <input id="total" type="text" value="" class="form-control" disabled>
                       </div>
                          <input type="hidden" name="no_pembayaran" value="{{ Auth::user()->no_pembayaran }}">
                          <input type="hidden" name="tanggal" value="{{ date('d-F-Y') }}">
                          <input type="hidden" id="sub" name="subtotal" value="">
                          <input type="hidden" id="adm" name="administrasi" value="">
                          <input type="hidden" id="sub_adm" name="total" value="">
                          <label>Upload Bukti Pembayaran</label>
                          <input type="file" accept="image/*" name="bukti_transfer" class="form-control" required>
                    </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                  <button id="sub_mit" type="submit" class="btn btn-primary">Upload</button>
               </div>
               </form>
          </div>
      </div>
   </div>
   <!-- End Modal -->
   @if(Auth::user()->progress == 75)
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
   @elseif(Auth::user()->progress >= 100)
   <div class="wrapper wrapper-content  animated fadeInRight">
       <div class="row">
           <div class="col-lg-12">
               <div class="ibox ">
                  <div class="ibox-content" style="border-left: 4px solid #0097e6">
                    <h4><i class="fa fa-check text-success"></i> Bukti Transfer yang anda kirim telah terkonfirmasi, Silahkan Menunggu Pengumuman Selanjutnya.</h4>
                 </div>
               </div>
            </div>
         </div>
   @else

   <div class="row">
       <div class="col-lg-12">
           <div class="wrapper wrapper-content animated fadeInRight">
   @endif

               <div class="ibox-content p-xl" style="margin-bottom: 30px;">
                       <div class="row">
                          <div class="col-sm-6 text-left">
                             <h4>Nomor Pembayaran</h4>
                             <h4 class="text-navy">{{ Auth::user()->no_pembayaran }}</h4>
                          </div>
                           <div class="col-sm-6 text-right">
                               <p>
                                   <span><strong>Tanggal:</strong> {{ date('d-F-Y') }}</span>
                               </p>
                           </div>
                       </div>

                       <div class="table-responsive m-t">
                           <table class="table invoice-table">
                               <thead>
                               <tr>
                                   <th>Pembayaran</th>
                                   <th>Jumlah</th>
                                   <th>Biaya Perorangan</th>
                                   <th>Biaya Administrasi</th>
                                   <th>Total</th>
                               </tr>
                               </thead>
                               <tbody>
                               <tr>
                                   <td><div><strong>Biaya Pendaftaran Atlit KEJURLAT 2019</strong></div>
                                       <small>Penyewaan tempat, Penyewaan barang, alat-alat, panitian, dan lain-lain.</small></td>
                                   <td>{{ $catlit }} atlit</td>
                                   <td>Rp. {{ uang($harga->atlit) }}</td>
                                   <td>Rp. {{ uang($harga->atlit * 10/100) }}</td>
                                   <td>Rp. {{ uang(($harga->atlit + $harga->atlit * 10/100) * $catlit) }}</td>
                               </tr>
                               <tr>
                                   <td><div><strong>Biaya Pendaftaran KONTINGEN</strong></div>
                                       <small>Biaya ini wajib dibayar masing-masing kontingen.
                                       </small></td>
                                   <td>1 Kontingen</td>
                                   <td>Rp. {{ uang($harga->kontingen) }}</td>
                                   <td>Rp. {{ uang($harga->kontingen * 10/100) }}</td>
                                   <td>Rp. {{ uang($harga->kontingen + $harga->kontingen * 10/100) }}</td>
                               </tr>

                               </tbody>
                           </table>
                       </div><!-- /table-responsive -->

                       <table class="table invoice-total">
                           <tbody>
                           <tr>
                               <td><strong>Sub Total :</strong></td>
                               <td>Rp. {{ $sub = uang(($harga->atlit * $catlit) + $harga->kontingen) }}</td>
                           </tr>
                           <tr>
                               <td><strong>Administrasi :</strong></td>
                               <td>Rp. {{ $adm = uang((($harga->atlit * 10/100) * $catlit) + $harga->kontingen * 10/100) }}</td>
                           </tr>
                           <tr>
                               <td><strong>TOTAL :</strong></td>
                               <td>Rp. {{ $total = uang((($harga->atlit * $catlit) + $harga->kontingen) + ((($harga->atlit * 10/100) * $catlit) + $harga->kontingen * 10/100)) }}</td>
                           </tr>
                           </tbody>
                       </table>
                       <div class="text-right">
                           <button type="button" class="btn btn-primary total" data-target="#pembayaran" data-toggle="modal" {{ Auth::user()->progress >= 75 ? 'disabled' : '' }}><i class="fa fa-dollar"></i> Upload Bukti Pembayaran</button>
                       </div>

                       <div class="well m-t"><strong>Perhatian </strong>
                           Biaya Administrasi adalah biaya pengembangan sistem informasi dan teknologi, biaya ini sudah termasuk biaya pengelolaan dan pemeliharaan sistem.
                       </div>
                   </div>
                </div>
                </div>
   @endif
@stop
@push('scripts')
   <script type="text/javascript">
      $(document).ready(function(){
         $(document).on('click', '.total', function(){
            $('#total').val("{{ $total }}");
            $('#sub').val("{{ $sub }}");
            $('#adm').val("{{ $adm }}");
            $('#sub_adm').val("{{ $total }}");
         });
      });
   </script>
@endpush
