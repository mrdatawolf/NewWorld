<?php

namespace App\Http\Livewire\Ores;


use App\Http\Controllers\BaseResourcesController;
use App\Http\Controllers\OresController;
use App\Models\BaseResources;
use App\Models\Ores;
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
        $br = Ores::find($id);
        $brc = new OresController();
            $brc->destroy($br);
    }

    public function render()
    {
        return view('livewire.ores.actions', ['id' => $this->thisId, 'name' => $this->name]);
    }
}
