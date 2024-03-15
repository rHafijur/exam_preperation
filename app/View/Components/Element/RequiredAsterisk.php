<?php

namespace App\View\Components\Element;

use Illuminate\View\Component;

class RequiredAsterisk extends Component
{
    public $required;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($required = false)
    {
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.element.required-asterisk');
    }
}
