<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_instansi' => ['required', 'string', 'max:255'],
            'nama_manager' => ['required', 'string', 'max:255'],
            'email_manager' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    public function email_validation(Request $req)
    {
      $email_manager = $req->email_manager;
      $user = \App\User::select('email_manager')->where('email_manager', $email_manager)->first();
      if ($email_manager != null) {
         if ($user != null) {
            echo "Email Ini Sudah Terdaftar!";
         }
      }else {
         echo "Email Tidak Boleh Kosong!";
      }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama_instansi' => $data['nama_instansi'],
            'nama_manager' => $data['nama_manager'],
            'email_manager' => $data['email_manager'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
