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
       <a href="{{ route('upload.user') }}"><i class="fa fa-file-text"></i> <span class="nav-label">Upload Berkas</span> <span class="pull-right label label-primary">!</span></a>
   </li>
   <li style="display: {{ Auth::user()->progress < 30 ? 'none' : '' }}">
       <a href="{{ route('atlit.user') }}"><i class="fa fa-users"></i> <span class="nav-label">Data Atlit </span></a>
   </li>
   <li class="active" style="display: {{ Auth::user()->progress < 60 ? 'none' : '' }}">
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
                <strong>Pembayaran</strong>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content p-xl">
                    <div class="row">
                       <div class="col-sm-6 text-left">
                          <h4>Nomor Pembayaran</h4>
                          <h4 class="text-navy">INV-000567F7-00</h4>
                       </div>
                        <div class="col-sm-6 text-right">
                            <p>
                                <span><strong>Tanggal Pembayaran:</strong> {{ date('d-M-y') }}</span><br/>
                                <span><strong>Tanggal Kadaluarsa:</strong> {{ date('d-M-y') }}</span>
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
                                <td>20 atlit</td>
                                <td>Rp. 100.000</td>
                                <td>Rp. 2000</td>
                                <td>Rp. 2.040.000</td>
                            </tr>
                            <tr>
                                <td><div><strong>Biaya Pendaftaran KONTINGEN</strong></div>
                                    <small>Biaya ini wajib dibayar masing-masing kontingen.
                                    </small></td>
                                <td>1 Kontingen</td>
                                <td>Rp. 300.000</td>
                                <td>Rp. 50.000</td>
                                <td>Rp. 350.000</td>
                            </tr>

                            </tbody>
                        </table>
                    </div><!-- /table-responsive -->

                    <table class="table invoice-total">
                        <tbody>
                        <tr>
                            <td><strong>Sub Total :</strong></td>
                            <td>Rp. 2.300.000</td>
                        </tr>
                        <tr>
                            <td><strong>Administrasi :</strong></td>
                            <td>Rp. 90.000</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL :</strong></td>
                            <td>Rp. 2.390.000</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <button class="btn btn-primary"><i class="fa fa-dollar"></i> Upload Bukti Pembayaran</button>
                    </div>

                    <div class="well m-t"><strong>Perhatian </strong>
                        Biaya Administrasi adalah biaya pengembangan sistem informasi dan teknologi, biaya ini sudah termasuk biaya pengelolaan dan pemeliharaan sistem.
                    </div>
                </div>
        </div>
    </div>
</div>

@stop
