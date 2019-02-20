<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
     'pembayaran', 'no_pembayaran', 'tanggal', 'subtotal', 'total', 'administrasi', 'user_id' 
   ];
}
