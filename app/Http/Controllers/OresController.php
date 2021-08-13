<?php

namespace App\Http\Controllers;

use App\Models\Ores;
use Illuminate\Http\Request;

class OresController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['ores'] = Ores::orderBy('id','desc')->paginate(20);

        return view('ores.index', $data);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ores.create');
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
        $ores = new Ores;
        $ores->name = $request->name;
        $ores->save();
        return redirect()->route('ores.index')
                         ->with('success','The ore has been created successfully.');
    }


    /**
     * Display the specified resource
     *
     * @param \App\Models\Ores $Ores
     * @param                           $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Ores $Ores, $id)
    {
        $resource = $Ores->find($id);
        return view('ores.show',compact('resource'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ores $Ores
     * @param                           $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Ores $Ores, $id)
    {
        $resource = $Ores->find($id);

        return view('ores.edit',compact('resource'));
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
        $ores = Ores::find($id);
        $ores->name = $request->name;
        $ores->save();
        return redirect()->route('ores.index')
                         ->with('success','Ore has been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ores $Ores
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ores $Ores)
    {
        $Ores->delete();

        return redirect()->route('ores.index');
    }
}
