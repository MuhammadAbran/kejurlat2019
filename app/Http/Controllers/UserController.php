<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Harga;
use App\Berkas;
use App\Atlit;
use App\Official;
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
     return view('user.upload_berkas', compact('berkas'));
   }

   public function uploadGetData()
   {
      $berkas = Berkas::where('user_id', Auth::user()->id)->get();

      return response()->json($berkas, 200);
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
     $id = Auth::user()->id;
     // $atlits = Atlit::all();
     $offs = Official::all();
     if (Atlit::where('user_id', $id)) {
        $atlits = Atlit::where('user_id', $id)->get();
        $catlit = count($atlits);
     }else {
        $catlit = 0;
     }
     return view('user.atlit', compact(['atlits', 'offs', 'catlit']));
   }

   // Delete Atlit
   public function delAtlit(Request $req)
   {
      Atlit::destroy($req->id);
   }

   // Edit Atlit
   public function editAtlit(Request $req)
   {
      $id = $req->id;
      $atlit = Atlit::find($id);
      if (!$req->avatar) {
         $req->avatar = $atlit->avatar;
      }
      $atlit->update([
         'nama' => $req->nama,
         'avatar' => $req->avatar,
         'tgl_lahir' => $req->tgl_lahir,
         'berat_badan' => $req->berat_badan,
         'gender' => $req->gender,
         'alamat' => $req->alamat,
         'email' => $req->email,
         'user_id' => Auth::user()->id
      ]);
      $atlit->kategori()->update([
         'kategori' => $req->kategori
      ]);
      session()->flash('atlit', 'Atlit Berhasil Diupdate!');
      return redirect()->back();
   }

   // Edit Data Atlit
   public function editDataAtlit(Request $req)
   {
      $atlit = Atlit::with('kategori')->find($req->id);
      return response()->json([
        $atlit
     ], 200);
   }

   // Delete Official
   public function delOfficial(Request $req)
   {
      Official::destroy($req->id);
   }

   // Tambah Official
   public function tambahOfficial(Request $req)
   {
      $official = Official::create([
         'nama' => $req->nama,
         'tgl_lahir' => $req->tgl_lahir,
         'gender' => $req->gender,
         'alamat' => $req->alamat,
         'email' => $req->email,
         'user_id' => Auth::user()->id
      ]);
      session()->flash('atlit', 'Official Berhasil Ditambahkan!');
      return redirect()->back();
   }
   // Foto Atlit
   public function fotoAtlit(Request $req)
   {
      if ($req->hasFile('file')) {
         $file = $req->file('file');
         $name = "Avatar_" . uniqid() . "." . $file->getClientOriginalExtension();
         $file->move(public_path('storage/avatars'), $name);

      }

      return response()->json([
         'avatar' => $name,
         'images' => '<img alt="avatar" class="img-circle" src="'. url('storage/avatars') . '/' . $name .'" style="width: 150px; height: 150px;">'
      ], 200);
   }

   // Tambah Atlit
   public function tambahAtlit(Request $req)
   {
      if (!$req->avatar) {
         $req->avatar = 'default.jpg';
      }
      $atlit = Atlit::create([
         'nama' => $req->nama,
         'avatar' => $req->avatar,
         'tgl_lahir' => $req->tgl_lahir,
         'berat_badan' => $req->berat_badan,
         'gender' => $req->gender,
         'alamat' => $req->alamat,
         'email' => $req->email,
         'user_id' => Auth::user()->id
      ]);
      $atlit->kategori()->create([
         'kategori' => $req->kategori
      ]);
      session()->flash('atlit', 'Atlit Berhasil Ditambahkan!');
      return redirect()->back();
   }

   // Kunci Data Atlit & Official
   public function kunciAtlit(Request $req)
   {
      $id = $req->id;
      $user = User::find($id);
      $user->progress = 60;
      $user->save();
   }

   //Pembayaran
   public function pembayaranShow()
   {
     $id = Auth::user()->id;
     if (Atlit::where('user_id', $id)) {
        $atlit = Atlit::where('user_id', $id)->get();
        $catlit = $atlit->count();
     }else {
        $catlit = 1;
     }
     $harga = Harga::find(1);
     return view('user.pembayaran', compact(['catlit', 'atlit', 'harga']));
   }

   //Upload Bukti Pembayaran
   public function pembayaranUpload(Request $req)
   {
      // dd($req->hasFile('bukti_transfer'));
      $id = Auth::user()->id;
      $user = User::find($id);

      if ($req->hasFile('bukti_transfer')) {
         $bukti = $req->file('bukti_transfer');
         $name = $req->tanggal . " bukti Transfer Kolat " . Auth::user()->nama_instansi . '.' . $bukti->getClientOriginalExtension();
         $bukti->move(public_path('storage/bukti_transfer'), $name);


      $pembayaran = new Pembayaran([
         'pembayaran' => $name,
         'no_pembayaran' => $req->no_pembayaran,
         'tanggal' => $req->tanggal,
         'subtotal' => $req->subtotal,
         'total' => $req->total,
         'administrasi' => $req->administrasi,
         'user_id' => $id
      ]);

      $user->progress = 75;
      $user->save();
      $pembayaran->save();

   }else {
      dd($req->file('bukti_transfer'));
   }

      return redirect()->route('dashboard.user');
   }

   //Pengumuman
   public function pengumumanShow()
   {
     return view('user.pengumuman');
   }
}
