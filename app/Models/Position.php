<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    public function legalEntity(){
        return $this->belongsTo(LegalEntity::class);
    }

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected  $fillable = [
        'title', 'description', 'responsibilities', 'competences', 'legal_entity_id'
    ];
}
