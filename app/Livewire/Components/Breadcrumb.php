<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Diglactic\Breadcrumbs\Breadcrumbs;

class Breadcrumb extends Component
{
    public $breadcrumbs = [];

    public $name = '';

    public $model;
    public function mount($name, $model = null)
    {
        $this->breadcrumbs =  Breadcrumbs::generate($name, $model);
    }
    public function render()
    {
        return view('livewire.components.breadcrumb');
    }
}
