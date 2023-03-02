<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeteoMap extends Model
{
    use HasFactory;

    protected $appends = ['icon', 'image', 'wind'];
    protected $guarded = ['id'];

    public function getIconAttribute()
    {
        return asset('assets/img/icons/'.$this->marker);
    }

    public function getImageAttribute()
    {
        return "<img src='".asset('assets/img/icons/'.$this->marker)."' alt=''>";
    }

    public function getWindAttribute()
    {
        // wind in format wind_speed m/s cir_direction (lat_direction)
        return "{$this->attributes['wind_speed']} m/s {$this->attributes['cir_direction']} ({$this->attributes['lat_direction']})";
    }

    public function getRainfallAttribute()
    {
        // If its null return '*'
        return $this->attributes['rainfall'] == 'null' ? '*' : $this->attributes['rainfall'];
    }

    public function getMinTempAttribute()
    {
        // If its null return '*'
        return $this->attributes['min_temp'] == 'null' ? '*' : $this->attributes['min_temp'];
    }

    public function getMaxTempAttribute()
    {
        // If its null return '*'
        return $this->attributes['max_temp'] == 'null' ? '*' : $this->attributes['max_temp'];
    }

    public function getSnowAttribute()
    {
        // If its null return '*'
        return $this->attributes['snow'] == 'null' ? '*' : $this->attributes['snow'];
    }

    public function getDescriptionAttribute()
    {
        return "
            <div class=''>
                <div class='card-body'>
                    <h5 class='card-title'>{$this->attributes['station_name']}</h5>
                    <p class='card-text'>{$this->attributes['description']}</p>
                </div>
            </div>
        ";
    }
}
