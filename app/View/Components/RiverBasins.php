<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RiverBasins extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $riverBasins;

    public function __construct()
    {
        $this->riverBasins = \App\Models\RiverBasin::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.river-basins');
    }
}
