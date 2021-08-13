<?php

namespace App\Http\Livewire\Base;


use App\Http\Controllers\BaseResourcesController;
use App\Models\BaseResources;
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
        $br = BaseResources::find($id);
        $brc = new BaseResourcesController();
            $brc->destroy($br);
    }

    public function render()
    {
        return view('livewire.base.actions', ['id' => $this->thisId, 'name' => $this->name]);
    }
}
