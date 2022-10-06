<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeteoStation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['icon'];

    public function getIconAttribute()
    {
        return asset('assets/img/icons/marker-icon.png');
    }
}
