<?php namespace App\Http\Livewire\Locations;

use App\Models\Locations;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfLocations extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Locations::orderBy('name');
    }

    public function columns()
    {
        return [
            NumberColumn::name('ID'),
            Column::name('name')->label('Location'),
            Column::callback(['id'], function ($id) {
                return view('livewire.locations.actions', ['id' => $id]);
            })->unsortable()

        ];
    }
}
