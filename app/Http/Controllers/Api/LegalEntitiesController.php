<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LegalEntityResource;
use App\Models\LegalEntity;
use Illuminate\Http\Request;

class LegalEntitiesController extends Controller
{
    public function index()
    {
        return LegalEntityResource::collection(LegalEntity::all());
    }
    public function get($uri)
    {
        return LegalEntityResource::collection(LegalEntity::select('id')
                                                            ->where('uri','=',$uri)
                                                            ->get());
    }
}
