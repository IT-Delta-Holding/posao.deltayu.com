<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LegalEntity;

class LegalEntityController extends Controller
{
    /**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:legalentity-list|legalentity-create|legalentity-edit|legalentity-delete', ['only'=>['index', 'show']]);
        $this->middleware('permission:legalentity-create', ['only'=>['create', 'store']]);
        $this->middleware('permission:legalentity-edit', ['only'=>['edit', 'update']]);
        $this->middleware('permission:legalentity-delete', ['only'=> ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legalEntities = LegalEntity::latest()->paginate(5);
        return view('legal-entities.index', compact('legalEntities'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('legal-entities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'detail'=> 'required',
            'uri' => 'required'
        ]);

        LegalEntity::create($request->all());

        return redirect()->route('legalentities.index')
            ->with('success', 'Legal entity created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $legalEntity = LegalEntity::find($id);
        return view('legal-entities.show',compact('legalEntity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $legalEntity = LegalEntity::find($id);
        return view('legal-entities.edit',compact('legalEntity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'uri' => 'required',
        ]);


        $legalEntity = LegalEntity::find($id);
        $legalEntity->name = $request->input('name');
        $legalEntity->detail = $request->input('detail');
        $legalEntity->uri = $request->input('uri');
        $legalEntity->save();
        return redirect()->route('legalentities.index')
            ->with('success','Legal entity updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        LegalEntity::find($id)->delete();
        return redirect()->route('legalentities.index')
            ->with('success','Legal entity deleted successfully');
    }
}
