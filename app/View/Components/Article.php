<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Article extends Component
{

    public $simple;
    public $article;
    public $subtext;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($article, $simple = false, $subtext = false)
    {
        $this->article = $article;
        $this->simple = $simple;
        $this->subtext = $subtext;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.article');
    }
}
