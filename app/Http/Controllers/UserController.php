<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
     session()->flash('msg', 'Anda Login Sebagai User!');
     return view('admin.dashboard');
   }
}
