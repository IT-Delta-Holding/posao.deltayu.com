<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\LegalEntity;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:position-list|position-create|position-edit|position-delete', ['only'=>['index', 'show']]);
        $this->middleware('permission:position-create', ['only'=>['create', 'store']]);
        $this->middleware('permission:position-edit', ['only'=>['edit', 'update']]);
        $this->middleware('permission:position-delete', ['only'=> ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $positions = Position::latest()->paginate(5);
        return view('positions.index', compact('positions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $legalEntities = LegalEntity::select('id', 'name')->get();

        return view('positions.create', compact('legalEntities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required'
        ]);

        Position::create($request->all());

        return redirect()->route('positions.index')
            ->with('success', 'Position created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::find($id);
        $legalEntity = LegalEntity::select('name')
            ->where('id','=', $position->legal_entity_id)
            ->get();
        return view('positions.show',compact('position', 'legalEntity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $position = Position::find($id);
        $legalEntity = LegalEntity::all();
        return view('positions.edit',compact('position', 'legalEntity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     */
    public function update(Request $request, int $id)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $position = Position::find($id);
        $position->title = $request->input('title');
        $position->description = $request->input('description');
        $position->responsibilities = $request->input('responsibilities');
        $position->competences = $request->input('competences');
        $position->legal_entity_id = $request->input('legal_entity_id');
        $position->save();

        return redirect()->route('positions.index')
            ->with('success','Position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Position::find($id)->delete();
        return redirect()->route('positions.index')
            ->with('success','Position deleted successfully');
    }
}
