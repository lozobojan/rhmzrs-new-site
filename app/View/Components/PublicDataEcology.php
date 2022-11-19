<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PublicDataEcology extends Component
{
    public $gasses;
    public $years;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $years = [];
        $gasses = [];
        $ecologyData = \App\Models\GasEmission::query()
            ->groupBy('year', 'gas')
            ->selectRaw('sum(value) as value, gas, year')
            ->get();
        foreach ($ecologyData as $data) {
            $years[] = $data['year'];
        }
        foreach ($ecologyData as $item) {
            isset($gasses[$item['gas']]) ? $gasses[$item['gas']] += [$item['year'] => $item['value']] : $gasses[$item['gas']] = [$item['year'] => $item['value']];
        }
        $this->gasses = $gasses;
        $this->years = array_unique($years);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.public-data-ecology');
    }
}
