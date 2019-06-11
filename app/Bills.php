<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
        protected $fillable = [
        'barcode',
        'expiredate',
        'brlamount',
        'bank',
        'cryptorate',
        'owner_id'
    ];

       protected $casts = [
        'status' => 'string'
    ];
        // protected $guard = [];
}


