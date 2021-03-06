<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items Edit') }}
        </h2>
    </x-slot>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('items.index') }}" enctype="multipart/form-data"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('items.update',$resource->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Item Name:</strong>
                        <input type="text" name="name" value="{{ $resource->name }}" class="form-control" placeholder="Item name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <strong>Bases Required:</strong>
                        <input type="text" name="bases" value="{{ $resource->bases_required }}" class="form-control" placeholder="Ingot base requirements">
                        @error('bases')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <strong>Ores Required:</strong>
                        <input type="text" name="ores" value="{{ $resource->ores_required }}" class="form-control" placeholder="Ingot ore requirements">
                        @error('ores')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <strong>Ingots Required:</strong>
                        <input type="text" name="ingots" value="{{ $resource->ingots_required }}" class="form-control" placeholder="Ingot ingot requirements">
                        @error('ingots')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <strong>Items Required:</strong>
                        <input type="text" name="items" value="{{ $resource->items_required }}" class="form-control" placeholder="Ingot items requirements">
                        @error('items')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
