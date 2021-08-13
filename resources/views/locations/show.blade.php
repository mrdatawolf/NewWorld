<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Location Show') }}
        </h2>
    </x-slot>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th style="width: 280px">Action</th>
        </tr>
        <tr>
            <td>{{ $locations->id }}</td>
            <td>{{ $locations->name }}</td>
            <td>
                <form action="{{ route('locations.destroy',$locations->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('locations.edit',$locations->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </table>
</x-app-layout>
