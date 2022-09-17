<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'links';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'slug',
        'route',
        'page_id',
        'parent_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function parentLinks()
    {
        return $this->hasMany(Link::class, 'parent_id', 'id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function parent()
    {
        return $this->belongsTo(Link::class, 'parent_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
