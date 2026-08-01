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

    public function getDepartureDay() {
        $departure_day = $this->departure_date->format('Y M d');
        return $departure_day;
    }

    public function getDepartureTime() {
        $departure_time = $this->departure_date->format('h:i A');
        return $departure_time;
    }
}
