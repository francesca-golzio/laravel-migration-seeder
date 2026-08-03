<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index() {

        $trains = Train::where('departure_date', '>', now())->orderBy('departure_date', 'asc')->get();

        return view('index', compact('trains'));
    }
}
