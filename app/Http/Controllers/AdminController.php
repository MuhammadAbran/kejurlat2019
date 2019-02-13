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
     $data['user'] = User::all();
     return view('admin.upload_berkas', $data);
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
     $data['user'] = User::all();
     return view('admin.pembayaran', $data);
   }

   //management Agenda
   public function agendaShow()
   {
      $data['user'] = User::all();
     return view('admin.agenda', $data);
   }

   //Pengumuman
   public function pengumumanShow()
   {
      $data['user'] = User::all();
     return view('admin.pengumuman', $data);
   }
}
