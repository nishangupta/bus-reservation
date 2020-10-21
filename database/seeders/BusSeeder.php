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
                'fare' => '20',
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
                'fare' => '300',
                'driver_name' => 'Smith',
                'status' => '1',
                'seats' => '50',
            ],
            [
                'name' => 'Monkai speedy',
                'bus_code' => 'dd123d',
                'from' => 'Darchula',
                'to' => 'Pokhara',
                'arrival_days' => 'Sunday',
                'arrival_time' => '12:00',
                'fare' => '300',
                'driver_name' => 'Rnonny',
                'status' => '1',
                'seats' => '50',
            ],

            [
                'name' => 'Supreme New Deluxe 12',
                'bus_code' => 'Z1fe3s3',
                'from' => 'Kathmandu',
                'to' => 'Pokhara',
                'arrival_days' => 'Monday',
                'arrival_time' => '12:00',
                'fare' => '30',
                'driver_name' => 'Michal',
                'status' => '1',
                'seats' => '50',
            ],

            [
                'name' => 'Ment 12 Bull',
                'bus_code' => 'zxs23',
                'from' => 'Mentas',
                'to' => 'Dentas',
                'arrival_days' => 'Tuesday',
                'arrival_time' => '12:00',
                'fare' => '255',
                'driver_name' => 'Munic',
                'status' => '1',
                'seats' => '50',
            ],

            [
                'name' => 'Speedy Bus',
                'bus_code' => 'cd123',
                'from' => 'Forest',
                'to' => 'Penthousr',
                'arrival_days' => 'Wednesday',
                'arrival_time' => '12:00',
                'fare' => '34',
                'driver_name' => 'Petty',
                'status' => '1',
                'seats' => '50',
            ],
            [
                'name' => 'Night Bus101',
                'bus_code' => 'g1s3',
                'from' => 'Pitch plot',
                'to' => 'Monsteral',
                'arrival_days' => 'Thursday',
                'arrival_time' => '12:00',
                'fare' => '55',
                'driver_name' => 'Beya',
                'status' => '1',
                'seats' => '50',
            ],
            [
                'name' => 'Day Every Bus 2',
                'bus_code' => 'Ev123',
                'from' => 'New york',
                'to' => 'Jersey City',
                'arrival_days' => 'Everyday',
                'arrival_time' => '12:00',
                'fare' => '552',
                'driver_name' => 'Sush',
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
