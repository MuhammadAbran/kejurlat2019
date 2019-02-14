<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
      $users = User::all();
      $data = [];
      $status = '';
      $label = '';
      foreach ($users as $user) {
         if ($user->progress == 0) {
            $status = 'Belum Upload Berkas';
            $label = 'primary';
         }else if ($user->progress == 15) {
            $status = 'Konfirmasi Berkas';
            $label = 'warning';
         }else if ($user->progress == 30) {
            $status = 'Belum Melengkapi Data';
            $label = 'primary';
         }else if ($user->progress == 60) {
            $status = 'Belum Membayar';
            $label = 'primary';
         }else if ($user->progress == 75) {
            $status = 'Konfirmasi Pembayaran';
            $label = 'warning';
         }else if ($user->progress == 100) {
            $status = 'Selesai';
            $label = 'success';
         }
         $tanggal = (string)$user->updated_at;
         $data[] = [
            'role' => $user->role,
            'kolat' => $user->nama_instansi,
            'ketua' => $user->nama_manager,
            'status' => $status,
            'label' => $label,
            'update' => date('d.m.Y', strtotime($tanggal)),
         ];
      }
      return view('admin.dashboard', compact('users', 'data'));
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
