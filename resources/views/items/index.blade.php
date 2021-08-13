<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items Index') }}
        </h2>
    </x-slot>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right mb-2">
                    <a class="btn btn-success bg-blue-100 hover:bg-blue-300" href="{{ route('items.create') }}"> Create Item</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th style="width: 280px">Action</th>
            </tr>
            @foreach ($items as $resource)
                <tr>
                    <td>{{ $resource->id }}</td>
                    <td>{{ $resource->name }}</td>
                    <td>
                        @livewire('items.actions', ['id' => $resource->id, 'name' => $resource->name])
                    </td>
                </tr>
            @endforeach
        </table>
    {!! $items->links() !!}
</x-app-layout>
