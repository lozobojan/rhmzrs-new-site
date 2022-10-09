<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceleroStation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['icon', 'description'];

    public function getIconAttribute()
    {
        return asset('assets/img/icons/station-2.png');
    }
    public function getDescriptionAttribute()
    {
        return "
            <div class=''>
                <div class='card-body'>
                    <h5 class='card-title'>{$this->attributes['station_name']}</h5>
                    <p class='card-text'>{$this->attributes['network_code']}</p>
                    <p class='card-text'>{$this->attributes['sensor']}</p>
                    <p class='card-text'>{$this->attributes['digitizer']}</p>
                </div>
            </div>
        ";
    }
}
