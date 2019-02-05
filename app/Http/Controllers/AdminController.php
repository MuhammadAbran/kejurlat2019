<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
      session()->flash('msg', 'Anda Login Sebagai Admin!');
      return view('admin.dashboard');
    }
}
