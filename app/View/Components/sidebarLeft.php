<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\MenuItem;

class sidebarLeft extends Component
{
    /**
     * Indicates the current page being viewed
     * 
     * @var string
     */
    public $currentPage;

    /**
     * Time ago
     * 
     * @var mixed
     */
    public $timeago;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($currentPage, $timeago = null)
    {
        $this->currentPage = $currentPage;
        $this->timeago = $timeago;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-left');
    }
}
