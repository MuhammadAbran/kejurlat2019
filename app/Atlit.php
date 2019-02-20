<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atlit extends Model
{
    protected $fillable = [
     'nama', 'email', 'tgl_lahir', 'gender', 'alamat', 'berat_badan', 'avatar', 'user_id'
   ];


   public function kategori()
   {
      return $this->hasOne(\App\Kategori::class);
   }
}
