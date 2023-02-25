<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'posts';
    const TYPES = [
        'post',
        'static',   // Zakucane stranice / WYSIWYG
        'alert',
        'bulletin', // Bliten
        'report',
        'paper',    // Radovi
        'pollutant_map',    // MOPL u WP / Mapa zagadjivaca,
        'project',
    ];

    protected $appends = [
        'cover_photo',
        'attachments',
        'default_photo'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'html_content',
        'title',
        'page_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getDefaultPhotoAttribute()
    {
        if (str_contains($this->page->slug, 'meteorologija')) {
            return asset('assets/img/meteorologija.jpg');
        }elseif (str_contains($this->page->slug, 'seizmologija')) {
            return asset('assets/img/seizmologija.jpg');
        }elseif (str_contains($this->page->slug, 'hidrologija')) {
            return asset('assets/img/hidrologija.jpg');
        }elseif (str_contains($this->page->slug, 'ekologija')) {
            return asset('assets/img/ekologija.jpg');
                }
        else {
            return asset('assets/img/placeholder.png');
        }
    }

    public function getCoverPhotoAttribute()
    {
        $file = $this->getMedia('cover_photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getAttachmentsAttribute()
    {
        return $this->getMedia('attachments');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
