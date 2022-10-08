<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PropertyImageGalleries extends Model
{
    protected $fillable = ['property_id', 'name', 'size'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
