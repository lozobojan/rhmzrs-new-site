<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'pages';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'html_content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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
