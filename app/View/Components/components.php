<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class components extends Component
{
    /**
     * Create a new component instance.
     */
    public $warn ;
    public function __construct($warn)
    {
         $this->warn = $warn;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components');
    }
}
