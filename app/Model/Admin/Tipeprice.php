<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Tipeprice extends Model
{
    protected $table = "tipe_price";
    protected $fillable = ['tipe_price'];

    // public function property()
    // {
    //     return $this->hasOne(Property::class);
    // }
}
