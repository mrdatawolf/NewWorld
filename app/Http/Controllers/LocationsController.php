<?php namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['locations'] = Locations::orderBy('id','desc')->paginate(20);

        return view('locations.index', $data);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('locations.create');
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
        $locations = new Locations;
        $locations->name = $request->name;
        $locations->save();
        return redirect()->route('locations.index')
                         ->with('success','The location has been created successfully.');
    }


    /**
     * Display the specified resource
     *
     * @param \App\Models\Locations $Locations
     * @param                           $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Locations $Locations, $id)
    {
        $resource = $Locations->find($id);
        return view('locations.show',compact('resource'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Locations $Locations
     * @param                           $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Locations $Locations, $id)
    {
        $resource = $Locations->find($id);

        return view('locations.edit',compact('resource'));
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
        $locations = Locations::find($id);
        $locations->name = $request->name;
        $locations->save();
        return redirect()->route('locations.index')
                         ->with('success','Location has been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Locations $Locations
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Locations $Locations)
    {
        $Locations->delete();

        return redirect()->route('locations.index');
    }
}
