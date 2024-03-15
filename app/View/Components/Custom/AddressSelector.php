<?php

namespace App\View\Components\Custom;

use Illuminate\View\Component;

use App\Models\Division;

class AddressSelector extends Component
{
    public $divisions;
    public $districts = [];
    public $upozillas = [];
    public $division_id;
    public $district_id;
    public $upozilla_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($division = null, $district = null, $upozilla = null)
    {
        $this->division_id = $division;
        $this->district_id = $district;
        $this->upozilla_id = $upozilla;
        // dd($division);
        $this->divisions = Division::with('districts.upozillas')->get();
        if($division){
            foreach($this->divisions as $div){
                if($div->id == $division){
                    $this->districts = $div->districts;
                    break;
                }
            }
        }
        if($district){
            foreach($this->districts as $dis){
                if($dis->id == $district){
                    $this->upozillas = $dis->upozillas;
                    break;
                }
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.custom.address-selector');
    }
}
