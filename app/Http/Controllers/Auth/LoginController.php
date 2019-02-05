<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function email_validation(Request $req)
    {
      // dd($req->all());
      $email_manager = $req->email_manager;
      $user = \App\User::select('email_manager')->where('email_manager', $email_manager)->first();
      if ($email_manager != null) {
         if ($user == null) {
            echo "Email Ini Tidak Terdaftar!";
         }
      }else {
         echo "Email Tidak Boleh Kosong!";
      }
    }

    public function password_validation(Request $req)
    {
         return $this->login($req);
    }
}
