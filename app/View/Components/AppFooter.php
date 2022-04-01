<?php

namespace App\View\Components;

use App\Models\Web;
use Illuminate\View\Component;

class AppFooter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $web;
    public function __construct()
    {
        $this->web = Web::first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layout.footer');
    }
}
