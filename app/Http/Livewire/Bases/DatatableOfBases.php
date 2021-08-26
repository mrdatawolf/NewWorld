<?php namespace App\Http\Livewire\Bases;

use App\Models\BaseResources;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfBases extends LivewireDatatable
{
    protected $listeners = ['refreshDatatable' => '$refresh'];
    public $exportable = true;

    public function builder()
    {
        return BaseResources::orderBy('name');
    }

    public function columns()
    {
        return [
            NumberColumn::name('ID'),
            Column::name('name')->label('Base Resource'),
            Column::callback(['id'], function ($id) {
                return view('livewire.bases.actions', ['id' => $id]);
            })->unsortable()

        ];
    }
}
