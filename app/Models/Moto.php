<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    protected $table = 'motos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'marca',
        'modelo',
    ];
    // public $timestamps = false;
}
