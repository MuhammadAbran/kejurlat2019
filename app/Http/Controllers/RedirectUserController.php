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
         return redirect()->route('dashboard.admin');
      }else {
         return redirect()->route('dashboard.user');
      }
    }
}
