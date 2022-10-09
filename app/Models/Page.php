<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends Model implements HasMedia
{
    use SoftDeletes;
    use HasFactory;
    use InteractsWithMedia;

    public $table = 'pages';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'attachments',
    ];

    protected $fillable = [
        'title',
        'slug',
        'html_content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getAttachmentsAttribute()
    {
        return $this->getMedia('attachments');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }


    public function pageProjects()
    {
        return $this->hasMany(Project::class, 'page_id', 'id');
    }

    public function pagePublicPurchases()
    {
        return $this->hasMany(PublicPurchase::class, 'page_id', 'id');
    }

    public function pagePublicCompetitions()
    {
        return $this->hasMany(PublicCompetition::class, 'page_id', 'id');
    }

    public function pagePosts()
    {
        return $this->hasMany(Post::class, 'page_id', 'id');
    }

    public function pageLinks()
    {
        return $this->hasMany(Link::class, 'page_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
