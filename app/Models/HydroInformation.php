<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HydroInformation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['icon'];

    public function getIconAttribute()
    {
        return asset('assets/img/icons/hidro.png');
    }

    public function getDescriptionAttribute()
    {
        return "
            <div class=''>
                <div class='card-body'>
                    <h5 class='card-title'>{$this->attributes['station_name']}</h5>
                    <p class='card-text'>". str_replace('<a ', '<a onclick='.'test()'. ' data-framer='.'iframe-'. rand(1,10000) .' ', $this->attributes['description']) ."</p>
                </div>
            </div>
        ";
    }
}
