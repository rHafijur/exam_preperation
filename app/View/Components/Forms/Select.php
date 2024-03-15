<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $label;
    public $options;
    public $value;
    public $required;
    public $select2;
    public $valueKey;
    public $labelKey;
    public $onChange;
 
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $valueKey = "id", $labelKey = null, $label = null, $options = [], $value = null, $required = false, $select2 = false, $onChange = null)
    {
        $this->name = $name;
        $this->valueKey = $valueKey;
        $this->labelKey = $labelKey;
        $this->label = $label ?? ucfirst($name);
        $this->options = json_decode(json_encode($options),true);
        $this->value = $value;
        $this->required = $required;
        $this->select2 = $select2;
        $this->onChange = $onChange;

        // dd($this->options[0][$this->showKey]);
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }
}