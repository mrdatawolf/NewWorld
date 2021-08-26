<?php namespace App\Http\Livewire\Ingots;

use App\Models\Ingots;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfIngots extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Ingots::orderBy('name');
    }

    public function columns()
    {
        return [
            NumberColumn::name('ID'),
            Column::name('name')->label('Ingot'),
            Column::callback(['id'], function ($id) {
                return view('livewire.ingots.actions', ['id' => $id]);
            })->unsortable()

        ];
    }
}
