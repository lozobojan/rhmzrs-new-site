<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentTemperature extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['icon', 'image'];

    public function getIconAttribute()
    {
        return asset('assets/img/icons/'.$this->description);
    }

    public function getImageAttribute()
    {
        return "<img src='".asset('assets/img/icons/'.$this->description)."'/>";
    }
}
