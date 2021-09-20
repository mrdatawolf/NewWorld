<?php namespace App\Http\Livewire\Markets;

use App\Models\BaseResources;
use App\Models\Ingots;
use App\Models\Items;
use App\Models\Locations;
use App\Models\MarketData;
use App\Models\Ores;
use App\Models\ResourceTypes;
use Livewire\Component;

class AddMarketDataPoint extends Component
{
    public $location;
    public $locations;
    public $type;
    public $types;
    public $resource;
    public $resources;
    public $value;
    public $amount;
    public bool $allowSubmit = false;
    public bool $submitted = false;

    private int $defaultAmount = 1;

    public function mount() {
        $this->locations = Locations::orderBy('name')->get();
        $this->types = ResourceTypes::all();
        $this->amount = $this->defaultAmount;

        $this->populateResources();
    }

    public function populateResources() {
        switch ($this->type) {
            case 1 :
                $this->resources = BaseResources::orderBy('name')->get();
                break;
            case 2:
                $this->resources = Ores::orderBy('name')->get();
                break;
            case 3:
                $this->resources = Ingots::orderBy('name')->get();
                break;
            case 4:
                $this->resources = Items::orderBy('name')->get();
                break;
            default:
                $this->resources = null;
                $this->resource = null;
        }
    }

    public function locationChanged() {
        $this->canSubmit();
    }

    public function typeChanged() {
        $this->resource = null;
        $this->populateResources();
        $this->canSubmit();
    }

    public function amountChanged() {
        $this->canSubmit();
    }

    public function valueChanged() {
        $this->canSubmit();
    }

    public function canSubmit() {
        $this->allowSubmit = !(empty($this->value) || empty($this->amount) || empty($this->location) || empty($this->type));
    }

    public function submit() {
        if($this->allowSubmit) {
            $this->submitted = true;
            $md = new MarketData();
            $md->locations_id = $this->location;
            $md->types_id = $this->type;
            $md->resources_id = $this->resource;
            $md->value = $this->value;
            $md->amount = $this->amount;
            $md->save();
            $this->resetValues(['location']);
            $this->emit('refreshDatatable');
        }
    }


    /**
     * @param array $except
     */
    private function resetValues($except) {
        $this->value = (in_array('value',$except)) ? $this->value : null;
        $this->amount = (in_array('amount',$except)) ? $this->amount : 1;
        $this->resource = (in_array('resource',$except)) ? $this->resource : null;
        $this->resources = (in_array('resources',$except)) ? $this->resources : null;
        $this->type = (in_array('type',$except)) ? $this->type : null;
        $this->location = (in_array('location',$except)) ? $this->location : null;
        $this->allowSubmit = false;
    }

    public function render()
    {
        return view('livewire.markets.add-market-data-point');
    }
}
