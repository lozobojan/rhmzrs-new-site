<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeteoStation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['icon', 'description_alt'];

    public function getIconAttribute()
    {
        return asset('assets/img/icons/marker-icon.png');
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
    public function getDescriptionAltAttribute()
    {
        $desc = str_replace("<div class=''>
                <div class='card-body'>
                    <h5 class='card-title'>{$this->attributes['station_name']}</h5>", '', $this->description);
        $desc = str_replace("    </div>
            </div>", '', $desc);
        $desc = str_replace("<p class='card-text'>", '', $desc);
        $desc = str_replace("</p>", '', $desc);
        $desc = str_replace("\n", '', $desc);

        return $desc;
    }

}
