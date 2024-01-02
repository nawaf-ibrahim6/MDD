<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideBarGroup extends Component
{
    public $page;
    public $prefix;
    public $icon;
    public $title;

    public function __construct($page, $prefix, $icon, $title)
    {
        $this->page = $page;
        $this->prefix = $prefix;
        $this->icon = $icon;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.dashboard.side-bar-group');
    }
}
