<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RedirectUserController extends Controller
{
    public function redirect()
    {
      if (Auth::user()->role) {

         return redirect('/dashboard');
      }else {
         
         return redirect('/user');
      }
    }
}
