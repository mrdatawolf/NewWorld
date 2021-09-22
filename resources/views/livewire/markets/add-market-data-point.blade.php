<div>
    <div class="mb-12">
        <label for="location" class="font-bold">Add </label>
        <select id="location" name="location" wire:model="location" wire:change="locationChanged" class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
            <option value=''>Location</option>
            @foreach($locations as $location)
                <option value={{ $location->id }}>{{ $location->name }}</option>
            @endforeach
        </select>
        <select id="type" name="type" wire:model="type" wire:change="typeChanged" class="border shadow p-2 bg-white hidden">
            <option value=''>Resource Type</option>
            @foreach($types as $type)
                <option value={{ $type->id }}>{{ $type->name }}</option>
            @endforeach
        </select>
        @if(! empty($resources))
            <select id="resource" name="resource" wire:model="resource" class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value=''>Resource</option>
                @foreach($resources as $resource)
                    <option value={{ $resource->id }}>{{ $resource->name }}</option>
                @endforeach
            </select>
            <input type="text" id="value" name="value" wire:model="value" wire:change="valueChanged" placeholder="Value" class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
            <input type="text" id="amount" name="amount" wire:model="amount" wire:change="amountChanged" placeholder="Amount" class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 px-4 py-2 pr-8 leading-tight border border-gray-400 rounded shadow appearance-none hover:border-gray-500 <?=($allowSubmit) ? '' : 'opacity-50 cursor-not-allowed';?>" wire:click="submit">
                Post
            </button>
        @endif
    </div>
</div>
