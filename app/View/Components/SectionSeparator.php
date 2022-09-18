<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SectionSeparator extends Component
{
    public $text;
    public $simple;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $simple = false){
        $this->text = $text;
        $this->simple = $simple;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.section-separator');
    }
}
