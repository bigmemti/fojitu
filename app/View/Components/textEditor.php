<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textEditor extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $column, public mixed $value = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-editor');
    }
}