<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earthquake extends Model
{
    use HasFactory;
    protected $table = "earthquakes";

    protected $guarded = ['id'];

    // append icon attribute if magnitude is greater than 5
    protected $appends = ['icon', 'description'];

    // get icon attribute
    public function getIconAttribute()
    {
        if ($this->attributes['magnitude'] > 3) {
            return asset('assets/img/icons/earthquake2.png');
        }
        return asset('assets/img/icons/earthquake.png');
    }

    // get description attribute
    public function getDescriptionAttribute()
    {
        return "
            <div class=''>
                <div class='card-body'>
                    <h5 class='card-title'>{$this->attributes['place']}</h5>
                    <p class='card-text'>Magnitude: {$this->attributes['magnitude']}</p>
                    <p class='card-text'>Time: {$this->attributes['earthquake_date']} {$this->attributes['earthquake_time']}</p>
                </div>
            </div>
        ";
    }

    // Get all earthquakes which publish status is not draft
    public function scopePublished($query)
    {
        return $query->where('publish_status', '=', 'DRAFT')->get();
    }
}
