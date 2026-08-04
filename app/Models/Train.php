<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Illuminate\Support\hours;
use function Illuminate\Support\minutes;

class Train extends Model
{
    protected $casts = [
        'departure_date' => 'datetime',
        'arrival_date' => 'datetime',
        'delay' => 'datetime:H:i:s',
        'is_on_time' => 'boolean',
        'is_cancelled' => 'boolean',
    ];

    public function getDepartureDay() {
        $departure_day = $this->departure_date->format('M d');
        return $departure_day;
    }
    
    public function getDepartureTime() {
        $departure_time = $this->departure_date->format('h:i A');
        return $departure_time;
    }
    
    public function getArrivalDay() {
        $arrival_day = $this->arrival_date->format('M d');
        return $arrival_day;
    }

    public function getArrivalTime() {
        $arrival_time = $this->arrival_date->format('h:i A');
        return $arrival_time;
    }

    public function getExpectedDepartureTime() {
        if ($this->is_on_time == false && $this->is_cancelled == false) {

            $expected_departure_time_if_delay = 
                $this->departure_date
                ->copy()
                ->addHours($this->delay->hour)
                ->addMinutes($this->delay->minute)
                ->addSeconds($this->delay->second)
                ->format('h:i A');

            return $expected_departure_time_if_delay;

        } else {
            return "-";
        }

    }

    public function getExpectedArrivalTime() {
        if ($this->is_on_time == false && $this->is_cancelled == false) {

            $expected_arrival_time_if_delay = 
                $this->arrival_date
                ->copy()
                ->addHours($this->delay->hour)
                ->addMinutes($this->delay->minute)
                ->addSeconds($this->delay->second)
                ->format('h:i A');

            return $expected_arrival_time_if_delay;

        } else {
            return "-";
        }

    }

    public function getPlatform() {
        if($this->departure_date > (now()->addMinutes(30))) {
            return '-';
        } else {
            return $this->platform;
        };
    }
    
    public function getStatus() {
        $now = now();

        if ($this->departure_date > ($now->clone()->addMinutes(30))) {
            
            return "N/D";

        } else {

            if ($this->is_cancelled) {
                return 'cancelled';

            } elseif ($this->is_on_time) {
                return 'on_time';

            } else {
                return 'delayed';
            }
        }
    }

}
