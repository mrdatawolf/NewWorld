<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item Show') }}
        </h2>
    </x-slot>
    <table class="table table-bordered table-auto">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Bases</th>
            <th>Ores</th>
            <th>Ingots</th>
            <th>Items</th>
            <th style="width: 280px">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="table-cell">{{ $item->id }}</td>
            <td class="table-cell">{{ $item->name }}</td>
            <td class="table-cell">
                <table>
                        @if(!empty($item->bases))
                            @foreach($item->bases as $base)
                            <tr><td><?=$base->name;?>:<?=$base->amount;?></td></tr>
                            @endforeach
                        @else
                            <tr><td>No bases required</td></tr>
                        @endif
                </table>
            </td>
            <td class="table-cell">
                <table>
                        @if(!empty($item->ores))
                            @foreach($item->ores as $ore)
                            <tr><td><?=$ore->name;?>:<?=$ore->amount;?></td></tr>
                            @endforeach
                        @else
                            <tr><td>No ores required</td></tr>
                        @endif

                </table>
            </td>
            <td class="table-cell">
                <table>

                        @if(!empty($item->ingots))
                            @foreach($item->ingots as $ingot)
                            <tr><td><?=$ingot->name;?>:<?=$ingot->amount;?></td></tr>
                            @endforeach
                        @else
                            <tr><td>No ingots required</td></tr>
                        @endif
                </table>
            </td>
            <td class="table-cell">
                <table>
                        @if(!empty($item->items))
                            @foreach($item->items as $thisItem)
                            <tr><td><?=$thisItem->name;?>:<?=$thisItem->amount;?></td></tr>
                            @endforeach
                        @else
                        <tr><td>No items required</td></tr>
                        @endif
                </table>
            </td>
            <td class="table-cell">
                @livewire('items.actions', ['id' => $item->id, 'name' => $item->name, 'hide' => 'show'])
            </td>
        </tr>
        </tbody>
    </table>
</x-app-layout>
