<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideBar extends Component
{
    public $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('components.dashboard.side-bar');
    }
}
