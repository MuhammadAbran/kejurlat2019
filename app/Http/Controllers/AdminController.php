<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

      return view('admin.dashboard');
    }

    //Konfirmasi Upload Document
   public function uploadShow()
   {
     return view('admin.upload_berkas');
   }

   //Data Kolat management
   public function kolatShow()
   {
     return view('admin.kolat');
   }

   //Konfirmasi Pembayaran
   public function pembayaranShow()
   {
     return view('admin.pembayaran');
   }

   //management Agenda
   public function agendaShow()
   {
     return view('admin.agenda');
   }

   //Pengumuman
   public function pengumumanShow()
   {
     return view('admin.pengumuman');
   }
}
