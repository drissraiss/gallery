<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category_options extends Component
{
    public $categories;
    public $selected;
    public function __construct($categories, $selected = null)
    {
        $this->$categories = $categories;
        $this->$selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category_options');
    }
}
