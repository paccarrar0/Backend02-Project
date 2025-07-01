<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Maintenance;

class MaintenanceSeeder extends Seeder
{
    public function run()
    {
        $numberOfMaintenances = 10;

        for ($i = 0; $i < $numberOfMaintenances; $i++) {
            Maintenance::create([
                'description' => 'Maintenance description ' . $i,
                'status' => 'pending',
                'equipment_id' => rand(1, 9)
            ]);
        }

        $this->command->info("Maintenances populated with $numberOfMaintenances registers");
    }
}
