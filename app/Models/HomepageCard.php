<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'link',
        'color',
    ];

    public function getColorTxtAttribute()
    {

        // if 0 return green, 1 return blue, 2 return red and 3 return orange

        return $this->attributes['color'] == 0 ? trans('cruds.homepageCard.fields.color.green')
            : ($this->attributes['color'] == 1 ? trans('cruds.homepageCard.fields.color.blue')
            : ($this->attributes['color'] == 2 ? trans('cruds.homepageCard.fields.color.red')
                : trans('cruds.homepageCard.fields.color.orange')));
    }

    public function getColorClassAttribute()
    {
        return $this->attributes['color'] == 0 ? 'bg-green'
            : ($this->attributes['color'] == 1 ? 'bg-primary'
            : ($this->attributes['color'] == 2 ? 'bg-danger'
                : 'bg-orange'));
    }
}
