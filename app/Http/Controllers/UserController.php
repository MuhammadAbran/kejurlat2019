<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berkas;
use App\User;
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
     // $user = Auth::user();
     // dd($user->berkas);
     return view('user.upload_berkas', compact('berkas'));
   }

   public function upload(Request $req)
   {
     if ($req->hasFile('file')) {
        $file = $req->file('file');
        $name = "Berkas ".uniqid().'.'.$file->getClientOriginalExtension();
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

   public function uploadKunci(Request $req)
   {
     $id = $req->id;
     $user = User::find($id);
     $user->progress = 15;
     $user->save();
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
