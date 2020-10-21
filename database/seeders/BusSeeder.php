<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buses = [
            [
                'name' => 'Highway Deluxe',
                'bus_code' => 'Ax1defa',
                'from' => 'Siddhartha Highway',
                'to' => 'Pokhara',
                'arrival_days' => 'Every day',
                'arrival_time' => '11:00',
                'fare' => '2000',
                'driver_name' => 'bucky',
                'status' => '1',
                'seats' => '50',
            ],
            [
                'name' => 'Supreme 12 Deluxe',
                'bus_code' => 'Z1fe3s3',
                'from' => 'Kathmandu',
                'to' => 'Pokhara',
                'arrival_days' => 'Every day except sunday',
                'arrival_time' => '12:00',
                'fare' => '3000',
                'driver_name' => 'Smith',
                'status' => '1',
                'seats' => '50',
            ],

        ];
        foreach ($buses as $index => $bus) {
            $i = $index + 1;
            $bus = Bus::factory()->create([
                'name' => $bus['name'],
                'bus_code' => $bus['bus_code'],
                'img' =>  'images/bus/' . $i . '.jpg',
                'from' => $bus['from'],
                'to' => $bus['to'],
                'arrival_days' => $bus['arrival_days'],
                'arrival_time' => $bus['arrival_time'],
                'fare' => $bus['fare'],
                'driver_name' => $bus['driver_name'],
                'status' => $bus['status'],
                'seats' => $bus['seats'],
            ]);
        }
    }
}
