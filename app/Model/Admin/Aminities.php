<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Aminities extends Model
{
    protected $fillable = ['aminities'];

    public function properties()
    {
        return $this->belongsToMany(Property::class)->withTimestamps();
    }
}
