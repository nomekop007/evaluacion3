<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pallet extends Model
{
      protected $fillable = [
        'proveedor','tipo','peso',
    ];
}
