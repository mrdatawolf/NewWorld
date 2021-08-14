<?php

namespace App\Http\Livewire\Ingots;


use App\Http\Controllers\IngotsController;
use App\Models\Ingots;
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
        $br = Ingots::find($id);
        $brc = new IngotsController();
            $brc->destroy($br);
    }

    public function render()
    {
        return view('livewire.ingots.actions', ['id' => $this->thisId, 'name' => $this->name]);
    }
}
