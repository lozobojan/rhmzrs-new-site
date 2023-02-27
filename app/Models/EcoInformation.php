<?php

namespace App\Models;

use DOMDocument;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcoInformation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['icon'];

    public function getIconAttribute()
    {
        return asset('assets/img/icons/marker-icon.png');
    }

    public function geto3Attribute()
    {
        return round(floatval($this->attributes['o3']), 2);
    }

    public function getno2Attribute()
    {
        return round(floatval($this->attributes['no2']), 2);
    }

    public function getpm10Attribute()
    {
        return round(floatval($this->attributes['pm10']), 2);
    }

    public function getpm25Attribute()
    {
        return round(floatval($this->attributes['pm25']), 2);
    }

    public function getcoAttribute()
    {
        return round(floatval($this->attributes['co']), 2);
    }

    public function getso2Attribute()
    {
        return round(floatval($this->attributes['so2']), 2);
    }

    public function getnoxAttribute()
    {
        return round(floatval($this->attributes['nox']), 2);
    }
    public function getnoAttribute()
    {
        return round(floatval($this->attributes['no']), 2);
    }

}
