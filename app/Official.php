<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    protected $table = 'officials';
    protected $fillable = ['nama', 'email', 'avatar', 'gender', 'alamat', 'user_id', 'tgl_lahir'];
}
