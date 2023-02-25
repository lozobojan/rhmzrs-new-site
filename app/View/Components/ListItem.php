<?php

namespace App\View\Components;

use App\Models\PublicCompetition;
use Illuminate\View\Component;

class ListItem extends Component
{
    public $item;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item, $type)
    {
        $this->item = $item;
        $this->type = $type;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-item');
    }
}
