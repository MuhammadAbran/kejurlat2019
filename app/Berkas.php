<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'berkas';
    protected $fillable = ['berkas', 'user_id'];
    
    public function user()
    {
      return $this->belongsTo(\App\User::class);
   }
}
