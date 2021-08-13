<?php

namespace App\Http\Livewire\Locations;


use App\Http\Controllers\LocationsController;
use App\Models\Locations;
use Livewire\Component;

class Actions extends Component
{
    public $thisId;
    public $name;

    public function mount($id, $name) {
        $this->thisId = $id;
        $this->name = $name;
    }

    public function delete(int $id) {
        $br = Locations::find($id);
        $brc = new LocationsController();
            $brc->destroy($br);
    }

    public function render()
    {
        return view('livewire.locations.actions', ['id' => $this->thisId, 'name' => $this->name]);
    }
}
