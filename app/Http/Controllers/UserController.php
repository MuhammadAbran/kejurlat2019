<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
     return view('user.dashboard');
   }

   //Upload Document
   public function uploadShow()
   {
     return view('user.upload_berkas');
   }

   //Data Atlit management
   public function atlitShow()
   {
     return view('user.atlit');
   }

   //Pembayaran
   public function pembayaranShow()
   {
     return view('user.pembayaran');
   }

   //Pengumuman
   public function pengumumanShow()
   {
     return view('user.pengumuman');
   }
}
