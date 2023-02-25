<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Alert extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'alerts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'level_text',
        'level_class',
    ];

    protected $fillable = [
        'active',
        'title',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'level',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // Get level attribute if 0 then return yellow if 1 return orange if 2 return red
    public function getLevelTextAttribute()
    {
        return $this->attributes['level'] == 0 ? trans('cruds.alert.fields.level.yellow') : ($this->attributes['level'] == 1 ? trans('cruds.alert.fields.level.orange') : trans('cruds.alert.fields.level.red'));
    }
    public function getLevelClassAttribute()
    {
        return $this->attributes['level'] == 0 ? 'bg-level-0' : ($this->attributes['level'] == 1 ? 'bg-level-1' : 'bg-level-2');
    }

}
