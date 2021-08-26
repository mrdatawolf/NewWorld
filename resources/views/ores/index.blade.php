<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ores Index') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-success bg-blue-100 hover:bg-blue-300" href="{{ route('ores.create') }}"> Create Ore</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <livewire:ores.datatable-of-ores />
    {!! $ores->links() !!}
</x-app-layout>
