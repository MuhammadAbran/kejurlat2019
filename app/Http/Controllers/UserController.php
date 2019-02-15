<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berkas;
use Auth;

class UserController extends Controller
{
   public function index()
   {
     return view('user.dashboard');
   }

   public function agenda()
   {
     return view('user.agenda');
   }

   //Upload Berkas
   public function uploadShow()
   {
     $berkas = Berkas::where('user_id', Auth::user()->id)->get();
     return view('user.upload_berkas', compact('berkas'));
   }

   public function upload(Request $req)
   {
     if ($req->hasFile('file')) {
        $file = $req->file('file');
        $name = "Upload Berkas".rand(1,2).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('storage/berkas'), $name);

        return Berkas::create([
           'berkas' => $name,
           'user_id' => $req->id
        ]);
     }
   }

   public function uploadDel(Request $req)
   {
     $id = $req->id;
     return Berkas::destroy($id);
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
