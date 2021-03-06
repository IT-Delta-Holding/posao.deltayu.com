<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected  $fillable = [
        'name', 'email', 'cv', 'terms_and_conditions', 'position_id','legal_entity_id'
    ];
}
