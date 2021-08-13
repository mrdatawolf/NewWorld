<?php

namespace App\Http\Livewire\Ingots;


use App\Http\Controllers\IngotsController;
use App\Models\Ingots;
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
        $br = Ingots::find($id);
        $brc = new IngotsController();
            $brc->destroy($br);
    }

    public function render()
    {
        return view('livewire.ingots.actions', ['id' => $this->thisId, 'name' => $this->name]);
    }
}
