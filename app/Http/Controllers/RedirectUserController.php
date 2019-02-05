<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RedirectUserController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }

    public function redirect()
    {
      if (Auth::user()->role) {
         session()->flash('msg', 'Selamat Datang ' . Auth::user()->nama_manager);
         return redirect()->route('dashboard.admin');
      }else {
         session()->flash('msg', 'Selamat Datang KOLAT ' . Auth::user()->nama_instansi);
         return redirect()->route('dashboard.user');
      }
    }
}
