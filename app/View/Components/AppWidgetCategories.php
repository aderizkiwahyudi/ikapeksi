<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class AppWidgetCategories extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;
    public function __construct()
    {
        $this->categories = Category::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('widget.categories');
    }
}
