<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $links;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links = [
            ['uri' => 'books.index', 'label' => 'All Books', 'icon' => 'bi-bookmark-heart'],
            // ['uri' => 'books.create', 'label' => 'Add Book', 'icon' => 'bi-bookmark-plus'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar', ['links' => $this->links]);
    }
}
