<?php

namespace App\View\Components;

use App\Models\Link;
use Illuminate\View\Component;

class MainLayout extends Component
{
    public $meta;
    public $metaTitle;
    public $metaDescription;
    public $metaKeywords;
    public $metaImage;
    public $metaUrl;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($meta = null)
    {
        $this->meta = $meta;
        $this->metaTitle = $meta['title'] ?? config('app.name');
        $this->metaDescription = $meta['description'] ?? config('app.name');
        $this->metaKeywords = $meta['keywords'] ?? 'rhmzrs';
        $this->metaImage = $meta['image'] ?? asset('assets/img/meta-og.png');
        $this->metaUrl = $meta['url'] ?? config('app.url');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.main-layout', [
            'links' => Link::query()->whereNull('parent_id')->get()
        ]);
    }
}
