<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Raw tables') }}
        </h2>
    </x-slot>
    <div class="rounded-lg shadow-lg bg-white max-w-screen overflow-x-scroll">
    <livewire:datatable model="App\Models\User" exclude="updated_at, created_at" />
    <livewire:datatable model="App\Models\BaseResources" exclude="updated_at, created_at" />
    <livewire:datatable model="App\Models\Ores" exclude="updated_at, created_at" />
    <livewire:datatable model="App\Models\Ingots" exclude="updated_at, created_at" />
    <livewire:datatable model="App\Models\Items" exclude="updated_at, created_at" />
    <livewire:datatable model="App\Models\Locations" exclude="updated_at, created_at" />
    </div>
</x-app-layout>
