<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = "properties";
    protected $fillable = [
        'kode',
        'title',
        'title_slug',
        'price',
        'purpose',
        'kondisi',
        'type',
        'floor',
        'bedroom',
        'bathroom',
        'luas_bangunan',
        'luas_tanah',
        'provinsi',
        'city',
        'daerah',
        'address',
        'maps',
        'description',
        'nearby',
        'cover_image',
        'video',
        'agent',
    ];

    public function aminities()
    {
        return $this->belongsToMany(Aminities::class)->withTimestamps();
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent');
    }

    public function gallery()
    {
        return $this->hasMany(PropertyImageGalleries::class);
    }
}
