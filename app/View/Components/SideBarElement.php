<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideBarElement extends Component
{
    public $page;
    public $prefix;
    public $icon;
    public $title;
    public $route;
    public $onclick;

    public function __construct($page, $prefix, $icon, $title, $route='', $onclick='')
    {
        $this->page = $page;
        $this->prefix = $prefix;
        $this->icon = $icon;
        $this->title = $title;
        $this->route = $route;
        $this->onclick = $onclick;
    }

    public function render()
    {
        return view('components.dashboard.side-bar-element');
    }
}
