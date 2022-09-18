<?php

namespace App\View\Components\Navbar;

use Illuminate\View\Component;
use App\Models\Link as LinkModel;

class Link extends Component
{
    public LinkModel $link;
    public bool $isRoot;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(LinkModel $link, bool $isRoot)
    {
        $this->link = $link;
        $this->isRoot = $isRoot;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar.link');
    }
}
