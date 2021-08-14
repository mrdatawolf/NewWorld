<?php namespace App\Http\Controllers;

use App\Models\BaseResources;
use App\Models\Ingots;
use App\Models\Items;
use App\Models\Ores;
use Illuminate\Http\Request;

class IngotsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['ingots'] = Ingots::orderBy('id','desc')->paginate(20);

        return view('ingots.index', $data);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ingots.create');
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
        $ingots = new Ingots;
        $ingots->name = $request->name;
        $ingots->save();
        return redirect()->route('ingots.index')
                         ->with('success','The ingot has been created successfully.');
    }


    /**
     * Display the specified resource
     *
     * @param \App\Models\Ingots $Ingots
     * @param                           $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Ingots $Ingots, $id)
    {
        $ingot = $Ingots->find($id);
        $b = (!empty($ingot->bases_required))? json_decode($ingot->bases_required) : [];
        foreach($b as $id => $amount) {
            $bases[] = (object) ['id' => $id, 'name' => BaseResources::find($id)->name, 'amount' => $amount];
        }
        $o = (!empty($ingot->ores_required))? json_decode($ingot->ores_required) : [];
        foreach($o as $id => $amount) {
            $ores[] = (object) ['id' => $id, 'name' => Ores::find($id)->name, 'amount' => $amount];
        }
        $in = (!empty($ingot->ingots_required))? json_decode($ingot->ingots_required) : [];
        foreach($in as $id => $amount) {
            $ingots[] = (object) ['id' => $id, 'name' => Ingots::find($id)->name, 'amount' => $amount];
        }
        $it = (!empty($ingot->items_required))? json_decode($ingot->items_required) : [];
        foreach($it as $id => $amount) {
            $items[] = (object) ['id' => $id, 'name' => Items::find($id)->name, 'amount' => $amount];
        }
        $ingot->bases = $bases ?? [];
        $ingot->ores = $ores ?? [];
        $ingot->ingots = $ingots ?? [];
        $ingot->items = $items ?? [];
        return view('ingots.show',compact('ingot'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ingots $Ingots
     * @param                           $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Ingots $Ingots, $id)
    {
        $resource = $Ingots->find($id);

        return view('ingots.edit',compact('resource'));
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
        $ingots = Ingots::find($id);
        $ingots->name = $request->name;
        $ingots->bases_required = $request->bases ?? "";
        $ingots->ores_required = $request->ores ?? "";
        $ingots->ingots_required = $request->ingots ?? "";
        $ingots->items_required = $request->items ?? "";
        $ingots->save();
        return redirect()->route('ingots.index')
                         ->with('success','Ingot has been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ingots $Ingots
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ingots $Ingots)
    {
        $Ingots->delete();

        return redirect()->route('ingots.index');
    }
}
