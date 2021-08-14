<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingot Show') }}
        </h2>
    </x-slot>
    <table class="table table-bordered">
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
                <td>{{ $ingot->id }}</td>
                <td>{{ $ingot->name }}</td>
                <td class="table-cell">
                    <table>
                        @if(!empty($ingot->bases))
                            @foreach($ingot->bases as $base)
                                <tr><td><?=$base->name;?>:<?=$base->amount;?></td></tr>
                            @endforeach
                        @else
                            <tr><td>No bases required</td></tr>
                        @endif
                    </table>
                </td>
                <td class="table-cell">
                    <table>
                        @if(!empty($ingot->ores))
                            @foreach($ingot->ores as $ore)
                                <tr><td><?=$ore->name;?>:<?=$ore->amount;?></td></tr>
                            @endforeach
                        @else
                            <tr><td>No ores required</td></tr>
                        @endif

                    </table>
                </td>
                <td class="table-cell">
                    <table>

                        @if(!empty($ingot->ingots))
                            @foreach($ingot->ingots as $thisIngot)
                                <tr><td><?=$thisIngot->name;?>:<?=$thisIngot->amount;?></td></tr>
                            @endforeach
                        @else
                            <tr><td>No ingots required</td></tr>
                        @endif
                    </table>
                </td>
                <td class="table-cell">
                    <table>
                        @if(!empty($ingot->items))
                            @foreach($ingot->items as $item)
                                <tr><td><?=$item->name;?>:<?=$item->amount;?></td></tr>
                            @endforeach
                        @else
                            <tr><td>No items required</td></tr>
                        @endif
                    </table>
                </td>
                <td class="table-cell">
                    @livewire('ingots.actions', ['id' => $ingot->id, 'name' => $ingot->name, 'hide' => 'show'])
                </td>
            </tr>
        </tbody>
    </table>
</x-app-layout>
