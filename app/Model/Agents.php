<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    protected $table = "agents";
    protected $fillable = ['kode_unity', 'username', 'password', 'nama_agent', 'email', 'nohp', 'alamat', 'foto_agent', 'status'];
}
