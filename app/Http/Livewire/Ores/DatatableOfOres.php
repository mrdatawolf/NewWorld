<?php namespace App\Http\Livewire\Ores;

use App\Models\Ores;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfOres extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Ores::orderBy('name');
    }

    public function columns()
    {
        return [
            NumberColumn::name('ID'),
            Column::name('name')->label('Ore'),
            Column::callback(['id'], function ($id) {
                return view('livewire.ores.actions', ['id' => $id]);
            })->unsortable()

        ];
    }
}
