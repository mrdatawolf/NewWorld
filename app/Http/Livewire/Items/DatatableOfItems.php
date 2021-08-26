<?php namespace App\Http\Livewire\Items;

use App\Models\Items;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfItems extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Items::orderBy('name');
    }

    public function columns()
    {
        return [
            NumberColumn::name('ID'),
            Column::name('name')->label('Item'),
            Column::callback(['id'], function ($id) {
                return view('livewire.items.actions', ['id' => $id]);
            })->unsortable()

        ];
    }
}
