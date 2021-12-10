<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        return PositionResource::collection(Position::all());
    }
    public function get($legal_entity_id)
    {
        return PositionResource::collection(Position::select('id', 'title', 'description', 'responsibilities', 'competences', 'legal_entity_id')
                                                        ->where('legal_entity_id', '=', $legal_entity_id)
                                                        ->get()
        );
    }
}
