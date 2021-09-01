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
    public $amount = 0;
    public $allowSubmit = false;
    public $submitted = false;

    public function mount() {
        $this->locations = Locations::all();
        $this->types = ResourceTypes::all();

        $this->populateResources();
    }

    public function populateResources() {
        switch ($this->type) {
            case 1 :
                $this->resources = BaseResources::all();
                break;
            case 2:
                $this->resources = Ores::all();
                break;
            case 3:
                $this->resources = Ingots::all();
                break;
            case 4:
                $this->resources = Items::all();
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
            $this->resetValues();
            $this->emit('refreshDatatable');
        }
    }

    private function resetValues() {
        $this->value = null;
        $this->amount = 0;
        $this->resource = null;
        $this->resources = null;
        $this->type = null;
        $this->location = null;
        $this->allowSubmit = false;
    }

    public function render()
    {
        return view('livewire.markets.add-market-data-point');
    }
}
