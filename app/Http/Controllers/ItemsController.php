<?php

namespace App\Http\Controllers;

use App\Models\BaseResources;
use App\Models\Ingots;
use App\Models\Items;
use App\Models\Ores;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['items'] = Items::orderBy('id','desc')->paginate(20);

        return view('items.index', $data);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('items.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $items = new Items;
        $items->name = $request->name;
        $items->save();
        return redirect()->route('items.index')
                         ->with('success','The item has been created successfully.');
    }


    /**
     * Display the specified resource
     *
     * @param \App\Models\Items $Items
     * @param                           $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Items $Items, $id)
    {
        $item = $Items->find($id);
        $b = (!empty($item->bases_required))? json_decode($item->bases_required) : [];
        foreach($b as $id => $amount) {
            $bases[] = (object) ['id' => $id, 'name' => BaseResources::find($id)->name, 'amount' => $amount];
        }
        $o = (!empty($item->ores_required))? json_decode($item->ores_required) : [];
        foreach($o as $id => $amount) {
            $ores[] = (object) ['id' => $id, 'name' => Ores::find($id)->name, 'amount' => $amount];
        }
        $in = (!empty($item->ingots_required))? json_decode($item->ingots_required) : [];
        foreach($in as $id => $amount) {
            $ingots[] = (object) ['id' => $id, 'name' => Ingots::find($id)->name, 'amount' => $amount];
        }
        $it = (!empty($item->items_required))? json_decode($item->items_required) : [];
        foreach($it as $id => $amount) {
            $items[] = (object) ['id' => $id, 'name' => Items::find($id)->name, 'amount' => $amount];
        }
        $item->bases = $bases ?? [];
        $item->ores = $ores ?? [];
        $item->ingots = $ingots ?? [];
        $item->items = $items ?? [];

        return view('items.show',compact(['item']));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Items $Items
     * @param                           $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Items $Items, $id)
    {
        $resource = $Items->find($id);

        return view('items.edit',compact('resource'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param                           $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        ]);
        $items = Items::find($id);
        $items->name = $request->name;
        $items->bases_required = $request->bases ?? "";
        $items->ores_required = $request->ores ?? "";
        $items->ingots_required = $request->ingots ?? "";
        $items->items_required = $request->items ?? "";
        $items->save();
        return redirect()->route('items.index')
                         ->with('success','Item has been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Items $Items
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Items $Items)
    {
        $Items->delete();

        return redirect()->route('items.index');
    }
}
