<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeteoMap extends Model
{
    use HasFactory;

    protected $appends = ['icon', 'image'];
    protected $guarded = ['id'];

    public function getIconAttribute()
    {
        return asset('assets/img/icons/'.$this->marker);
    }

    public function getImageAttribute()
    {
        return "<img src='".asset('assets/img/icons/'.$this->marker)."' alt=''>";
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
