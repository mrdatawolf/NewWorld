<?php

namespace App\Http\Controllers;

use App\Models\Items;
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
        $resource = $Items->find($id);
        return view('items.show',compact('resource'));
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
