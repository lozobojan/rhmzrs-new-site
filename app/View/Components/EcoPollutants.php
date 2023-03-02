<?php

namespace App\View\Components;

use App\Models\Page;
use Illuminate\View\Component;

class EcoPollutants extends Component
{
    public $page;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = Page::query()->where('slug', 'pregled-podataka')->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eco-pollutants');
    }
}
