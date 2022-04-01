<?php

namespace App\View\Components;

use App\Models\Program;
use App\Models\Web;
use Illuminate\View\Component;

class AppHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $web;
    public $program;
    public function __construct()
    {
        $this->web = Web::first();
        $this->program = Program::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layout.header');
    }
}
