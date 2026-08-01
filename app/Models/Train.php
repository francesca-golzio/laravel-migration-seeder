<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $casts = [
        'departure_date' => 'datetime',
        'arrival_date' => 'datetime',
        'is_on_time' => 'boolean',
        'is_cancelled' => 'boolean',
    ];
}
