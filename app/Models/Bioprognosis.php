<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bioprognosis extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'bio_prognoses';

    protected $appends = ['icon', 'description'];

    public function getIconAttribute()
    {
        return asset('assets/img/icons/'. $this->value . '.png');
    }
    public function getDescriptionAttribute()
    {
        return "<img src='" . asset('assets/img/icons/'.$this->value.'.png') . "'' > $this->value";
    }
}
