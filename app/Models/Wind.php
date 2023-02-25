<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wind extends Model
{
    use HasFactory;

    protected $appends = ['direction', 'icon'];

    public function getDirectionAttribute(){
        return "$this->lat_direction ($this->cir_direction)";
    }
    public function getIconAttribute()
    {
        return asset('assets/img/icons/marker-icon.png');
    }
}
