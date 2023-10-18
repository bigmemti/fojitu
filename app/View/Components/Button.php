<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $href;
    public string $style = "";
    public static array $class_types=[
        'create' => 'bg-green-500 hover:bg-green-400 dark:bg-green-800 dark:hover:bg-green-700',
        'info' => 'bg-cyan-500 hover:bg-cyan-400 dark:bg-cyan-800 dark:hover:bg-cyan-700',
        'edit' => 'bg-yellow-500 hover:bg-yellow-400 dark:bg-yellow-800 dark:hover:bg-yellow-700'
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(string $href, string $type)
    {
        $this->href = $href;
        $this->style .= ' ' . self::$class_types[$type];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
