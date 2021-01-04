<?php

use Illuminate\Database\Seeder;
use App\blood_pressure;
use Carbon\Carbon;

class BloodPressureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for($i=0;$i<100;$i++){
            blood_pressure::create([
                'rate'=>rand(50,190),
                'systolic'=>rand(100,140),
                'diastolic'=>rand(70,120),
                'created_at'=>Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s')
            ]);
        }
    }
}
