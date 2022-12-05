<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Earthquake extends Model
{
    use HasFactory;
    protected $table = "earthquakes";

    public const PUBLISH_STATUS_SELECT = [
        'DRAFT'     => 'Нацрт',
        'PUBLISHED' => 'Објављен',
    ];

    public const EARTHQUAKE_TYPE_SELECT = [
        'AUTOMATIC' => 'Аутоматски',
        'FINAL'     => 'Обрађени',
    ];

    protected $dates = [
        'earthquake_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'batch_version',
        'earthquake_type',
        'publish_status',
        'earthquake_date',
        'earthquake_time',
        'lat',
        'lng',
        'depth',
        'magnitude',
        'place',
        'municipality',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = ['id'];

    // append icon attribute if magnitude is greater than 5
    protected $appends = ['icon', 'description'];

    // get icon attribute
    public function getIconAttribute()
    {
        if ($this->attributes['earthquake_type'] === 'AUTOMATIC') {
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
                    <p class='card-text'>Магнитуда: {$this->attributes['magnitude']}</p>
                    <p class='card-text'>време: {$this->attributes['earthquake_date']} {$this->attributes['earthquake_time']}</p>
                </div>
            </div>
        ";
    }

    // Get all earthquakes which publish status is not draft
    public function scopePublished($query)
    {
        return $query->where('publish_status', '!=', 'DRAFT')->get();
    }

    public function getEarthquakeDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEarthquakeDateAttribute($value)
    {
        $this->attributes['earthquake_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
