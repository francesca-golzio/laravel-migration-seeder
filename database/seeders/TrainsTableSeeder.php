<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $companies = ['Hull Trains', 'Grand Central', 'LNER'];
        
        for($i = 0; $i < 20; $i++) {

            $newTrain = new Train();

            $newTrain->company = $faker->randomElement($companies);
            $newTrain->departure_station = 'King\'s Cross';
            $newTrain->arrival_station = $faker->streetName();
            $newTrain->departure_date = Carbon::parse($faker->dateTimeBetween('now', '+1 month'));
            $newTrain->arrival_date = (clone $newTrain->departure_date)->addMinutes($faker->numberBetween(30, 300));
            $newTrain->delay = Carbon::createFromTime($faker->numberBetween(0, 6), $faker->numberBetween(0, 59), 0);
            $newTrain->train_code = $faker->numerify('####');
            $newTrain->carriages = $faker->numberBetween(1, 11);
            $newTrain->platform = $faker->numberBetween(1, 8);
            $newTrain->is_on_time = $faker->boolean();
            $newTrain->is_cancelled = $faker->boolean(0.9);

            $newTrain->save();

        }
    }
}
