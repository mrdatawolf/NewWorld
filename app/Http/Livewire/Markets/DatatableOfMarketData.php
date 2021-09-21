<?php namespace App\Http\Livewire\Markets;

use App\Models\BaseResources;
use App\Models\Ingots;
use App\Models\Items;
use App\Models\Locations;
use App\Models\MarketData;
use App\Models\Ores;
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
        return MarketData::select('locations_id', 'types_id', 'resources_id', 'market_data.updated_at', 'market_data.created_at', 'value', 'amount')
                         ->groupBy(['locations_id', 'types_id', 'resources_id'])
                         ->orderBy('market_data.updated_at');
    }


    public function columns()
    {
        return [
            Column::name('locations.name')->label('Location')->filterable($this->locations)->truncate(15),
            Column::name('types.name')->label('Resource Type')->filterable($this->resourceTypes),
            Column::name('baseResources.name')->label('Base Resource')->filterable($this->baseResources),
            Column::name('ores.name')->label('Ores')->filterable($this->ores),
            Column::name('ingots.name')->label('Ingots')->filterable($this->ingots),
            Column::name('items.name')->label('Items')->filterable($this->items),
            NumberColumn::name('value')->label('value')->filterable()->alignRight(),
            NumberColumn::name('amount')->label('amount')->filterable()->alignRight(),
            DateColumn::name('updated_at')->label('date')->filterable(),
        ];
    }


    public function getLocationsProperty()
    {
        return Locations::pluck('name');
    }


    public function getResourceTypesProperty()
    {
        return ResourceTypes::pluck('name');
    }

    public function getBaseResourcesProperty()
    {
        return BaseResources::pluck('name');
    }

    public function getOresProperty()
    {
        return Ores::pluck('name');
    }

    public function getIngotsProperty()
    {
        return Ingots::pluck('name');
    }

    public function getItemsProperty()
    {
        return Items::pluck('name');
    }
}
