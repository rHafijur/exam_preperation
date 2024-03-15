<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $label;
    public $value;
    public $required;
    public $type;
    public $classes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,  $label = null, $value = null, $required = false, $type = "text", $classes = [] )
    {
        $this->name = $name;
        $this->label = $label ?? ucfirst($name);
        $this->value = $value;
        $this->required = $required;
        $this->type = $type;
        $this->classes = $classes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
