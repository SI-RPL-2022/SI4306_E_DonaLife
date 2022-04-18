<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AuthDonaturLayout extends Component
{
    public $title;
    public function __construct($title = null)
    {
        $this->title = $title ?? 'DonaLife';
    }
    
    public function render()
    {
        return view('theme.donatur.auth.main');
    }
}
