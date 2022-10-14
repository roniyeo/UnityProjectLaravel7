<?php

namespace App\Model\Agent;

use Illuminate\Database\Eloquent\Model;

class UserAgent extends Model
{
    protected $table = "agents";
    protected $fillable = ['kode_unity', 'username', 'password', 'nama_agent', 'email', 'nohp', 'alamat', 'foto_agent', 'status'];
}
