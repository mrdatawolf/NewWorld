<?php namespace App\Http\Livewire\Markets;

use App\Models\Locations;
use App\Models\MarketData;
use App\Models\ResourceTypes;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfMarketData extends LivewireDatatable
{
    protected $listeners = ['refreshDatatable' => '$refresh'];

    public $exportable = true;

    public function builder()
    {
        return MarketData::orderBy('market_data.updated_at')->with('locations', 'types', 'baseResources', 'ores', 'ingots', 'items');
    }

    public function columns()
    {
        return [
            Column::name('locations.name')->label('Location')->filterable($this->locations)->truncate(8),
            Column::name('types.name')->label('Resource Type')->filterable($this->resourceTypes),
            Column::name('baseResources.name')->label('Base Resource'),
            Column::name('ores.name')->label('Ores'),
            Column::name('ingots.name')->label('Ingots'),
            Column::name('items.name')->label('Items'),
            NumberColumn::name('value')->label('value')->filterable()->alignRight(),
            NumberColumn::name('amount')->label('amount')->filterable()->alignRight(),
            DateColumn::name('updated_at')->label('date')->filterable(),
        ];
    }

    public function getLocationsProperty() {
        return Locations::pluck('name');
    }

    public function getResourceTypesProperty() {
        return ResourceTypes::pluck('name');
    }
}
