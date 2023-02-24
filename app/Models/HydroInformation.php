<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HydroInformation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['icon'];

    public function getIconAttribute()
    {
        return asset('assets/img/icons/hidro.png');
    }

    public function getDescriptionAttribute()
    {
        // Get the description from the model attributes
        $description = $this->attributes['description'];

        // Find all <a> elements with an href attribute
        $doc = new \DOMDocument();
        @$doc->loadHTML('<?xml encoding="UTF-8">' . $description);
        $links = $doc->getElementsByTagName('a');
        foreach ($links as $link) {
            if ($link->hasAttribute('href')) {
                // Replace the href with the proxied URL
                $proxiedUrl = url('/api/proxy?url=' . urlencode($link->getAttribute('href')));
                $link->setAttribute('href', $proxiedUrl);
                $link->setAttribute('data-framer', 'iframe-' . rand(1, 10000));
                $link->setAttribute('onclick', 'test();');
            }
        }

        // Return the updated description HTML
        return "
        <div class=''>
            <div class='card-body'>
                <h5 class='card-title'>{$this->attributes['station_name']}</h5>
                <p class='card-text'>". $doc->saveHTML() ."</p>
            </div>
        </div>
    ";
    }
}
