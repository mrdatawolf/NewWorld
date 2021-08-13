<?php

namespace App\Http\Controllers;

use App\Models\BaseResources;
use Illuminate\Http\Request;

class BaseResourcesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['baseResources'] = BaseResources::orderBy('id','desc')->paginate(20);

        return view('base_resources.index', $data);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('base_resources.create');
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
        $br = new BaseResources;
        $br->name = $request->name;
        $br->save();
        return redirect()->route('base_resources.index')
                         ->with('success','The base resource has been created successfully.');
    }


    /**
     * Display the specified resource
     *
     * @param \App\Models\BaseResources $baseResources
     * @param                           $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(BaseResources $baseResources, $id)
    {
        $baseResource = $baseResources->find($id);
        return view('base_resources.show',compact('baseResource'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\BaseResources $baseResources
     * @param                           $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(BaseResources $baseResources, $id)
    {
        $baseResource = $baseResources->find($id);

        return view('base_resources.edit',compact('baseResource'));
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
        $br = BaseResources::find($id);
        $br->name = $request->name;
        $br->save();
        return redirect()->route('base_resources.index')
                         ->with('success','Base Resource has been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BaseResources $baseResources
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(BaseResources $baseResources): \Illuminate\Http\RedirectResponse
    {
        $baseResources->delete();

        return redirect()->route('base_resources.index');
    }
}
