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
        return $this->attributes['color'] == 0 ? trans('cruds.homepageCard.fields.color.green') : ($this->attributes['color'] == 1 ? trans('cruds.homepageCard.fields.color.blue') : trans('cruds.homepageCard.fields.color.red'));
    }

    public function getColorClassAttribute()
    {
        return $this->attributes['color'] == 0 ? 'bg-green' : ($this->attributes['color'] == 1 ? 'bg-primary' : 'bg-danger');
    }
}
