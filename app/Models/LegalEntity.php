<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalEntity extends Model
{
    use HasFactory;

    public function position(){
        return $this->hasMany(Position::class);
    }

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected  $fillable = [
        'name', 'detail', 'uri'
    ];
}