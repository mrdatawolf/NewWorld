<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Markets') }}
        </h2>
    </x-slot>
    <div class="border-solid border-2 border-light-blue-300">
    @livewire('markets.add-market-data-point')
    </div>
    <livewire:markets.datatable-of-market-ore-data/>
</x-app-layout>
