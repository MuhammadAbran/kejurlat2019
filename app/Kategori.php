<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $tabel = 'kategoris';
    protected $fillable = ['kategori', 'atlit_id'];

    public function atlit()
    {
      return $this->belongsTo(\App\Atlit::class);
   }
}
