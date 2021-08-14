<?php

namespace App\Http\Livewire\Bases;


use App\Http\Controllers\BaseResourcesController;
use App\Models\BaseResources;
use Livewire\Component;

class Actions extends Component
{
    public $thisId;
    public $name;
    public $hide;

    public function mount($id, $name, $hide = null) {
        $this->thisId = $id;
        $this->name = $name;
        $this->hide = $hide;
    }

    public function delete(int $id) {
        $br = BaseResources::find($id);
        $brc = new BaseResourcesController();
            $brc->destroy($br);
    }

    public function render()
    {
        return view('livewire.bases.actions', ['id' => $this->thisId, 'name' => $this->name]);
    }
}
