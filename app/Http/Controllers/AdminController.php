<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
      $data['user'] = User::all();
      return view('admin.dashboard', $data);
    }

    //Konfirmasi Upload Document
   public function uploadShow()
   {
     return view('admin.upload_berkas');
   }

   //Data Kolat management
   public function kolatShow($id)
   {
     $data['user'] = User::find($id)->get();
     // dd($data);
     return view('admin.kolat', $data);
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
