<?php

namespace App\Http\Livewire\Items;


use App\Http\Controllers\ItemsController;
use App\Models\Items;
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
        $br = Items::find($id);
        $brc = new ItemsController();
            $brc->destroy($br);
    }

    public function render()
    {
        return view('livewire.items.actions', ['id' => $this->thisId, 'name' => $this->name]);
    }
}
