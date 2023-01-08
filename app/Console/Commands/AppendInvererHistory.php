<?php

namespace App\Console\Commands;

use Faker\Factory as Faker;
use App\Models\Invertor;
use Illuminate\Console\Command;

class AppendInvererHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simulate:history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $active_inverters = Invertor::where('status', 200)->get();
        $faker = Faker::create();
        foreach ($active_inverters as $inverter) {
            if($inverter->histories()->exists()) {
                $last_history = $inverter->histories()->orderByDesc('id')->first();
                $data = [
                    'current_power' => $last_history->current_power,
                    'current_battery' => $last_history->current_battery,
                    'current_consumption' => $last_history->current_consumption,
                    'current_max_capacity' => $last_history->current_max_capacity,
                    'total_string_capacity' => $last_history->total_string_capacity + rand(-3,3),
                    'performance' => $last_history->performance,
                    'is_completed' => true,
                    'status' => $last_history->status,
                    'power_type' => $last_history->power_type,
                    'error' => null,
                ];
                if(rand(1,100) < 10) {
                    $data['current_max_capacity'] = $data['current_max_capacity'] - (rand(0, 5) * 10000) * array_rand([-1, 1]);
                    if($data['current_max_capacity'] > $inverter->max_capacity) {
                        $data['current_max_capacity'] = $inverter->max_capacity;
                    }
                }

                if(rand(0,100) <= 5) {
                    $data['status'] = $faker->randomElement([500, 401, 404, 501]);
                    $data['error'] = $faker->unique()->realTextBetween(50, 150);
                    $inverter->error = $data['error'];
                } elseif(rand(0,100) <= 70) {
                    $data['status'] = $last_history->status;
                    $data['error'] = $last_history->error;
                } else {
                    $data['status'] = 200;
                }

                if(rand(0,100) < 15) {
                    if($data['power_type'] === 1)
                        $data['power_type'] = 2;
                    elseif ($data['power_type'] === 2)
                        $data['power_type'] = 1;
                }

                $current_h = (int)date('H');
                if($current_h > 6 && $current_h < 17) {
                    if($current_h < 13) {
                        $data['current_power'] += rand(500, 1000);
                    } else {
                        $data['current_power'] -= rand(500, 1000);
                    }
                } else {
                    $data['current_power'] -= $data['current_power'] * 0.3;
                }

                if($data['current_power'] < 0)
                    $data['current_power'] = 0;

                if($data['current_power'] > $data['current_max_capacity'])
                    $data['current_power'] = $data['current_max_capacity'];

                if($data['power_type'] === 1) {
                    $new_current_consumption = rand(-150, 0);
                    if ($new_current_consumption !== 0 && $data['current_consumption'] > 0) {
                        $delta = $new_current_consumption / $data['current_consumption'];
                        if ($new_current_consumption < 0) {
                            $data['current_consumption'] -= $new_current_consumption;
                            $data['performance'] -= $delta / 2;
                        } elseif ($new_current_consumption > 0) {
                            $data['current_consumption'] += $new_current_consumption;
                            $data['performance'] += $delta / 2;
                        }
                        if ($data['performance'] > 1) {
                            $data['performance'] = 1;
                        }
                    } else {
                        $data['current_consumption'] = $data['current_power'];
                    }
                }elseif ($data['power_type'] === 2) {
                    $new_current_consumption = rand(-150, 0);
                    if ($new_current_consumption !== 0 && $data['current_battery'] > 0) {
                        $delta = $new_current_consumption / $data['current_battery'];
                        if ($new_current_consumption < 0) {
                            $data['current_battery'] -= $new_current_consumption;
                            $data['performance'] -= $delta / 2;
                        } elseif ($new_current_consumption > 0) {
                            $data['current_battery'] += $new_current_consumption;
                            $data['performance'] += $delta / 2;
                        }
                        if ($data['performance'] > 1) {
                            $data['performance'] = 1;
                        }
                    } else {
                        $data['current_battery'] = $data['current_power'];
                    }
                }

                $inverter->histories()->create($data);
            } else {
                // Create first history to this inverter
                $data = [
                    'current_power' => 0.0,
                    'current_battery' => 0.0,
                    'current_consumption' => 0.0,
                    'total_string_capacity' => 3.0,
                    'current_max_capacity' => $inverter->max_capacity,
                    'performance' => 1.0,
                    'is_completed' => true,
                    'status' => 200,
                    'power_type' => 1,
                    'error' => null,
                ];
                if(rand(0,100) < 30){
                    $data['error'] = $faker->unique()->realTextBetween(100, 150);
                    $data['status'] = $faker->randomElement([500, 401, 404, 501]);
                }
                if(rand(0,1) == 1){
                    $data['performance'] = rand(50, 100) / 100;
                }
                if(rand(0,1) == 1){
                    $data['total_string_capacity'] = rand(5, 100) / 100;
                }

                if(rand(0,1) == 1){
                    $data['current_power'] = rand(500,50000);
                    $data['power_type'] = rand(1,2);
                    if($data['power_type'] === 1) {
                        $data['current_consumption'] = $data['current_power'] + rand(-100, 0);
                    } elseif ($data['power_type'] === 2 && $inverter->has_battery) {
                        $data['current_battery'] = $data['current_power'] + rand(-200, 0);
                    }
                }

                $inverter->histories()->create($data);
            }
        }

        return 0;
    }
}
