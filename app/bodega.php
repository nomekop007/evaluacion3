<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bodega extends Model
{
      protected $fillable = [
        'estado','trabajador','is','ubicacion','pallet',
    ];
}
