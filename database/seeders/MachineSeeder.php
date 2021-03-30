<?php

namespace Database\Seeders;

use App\Models\Machines;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Machines::create([
            'machine_no'=>'12machine',
            'is_active'=>'YES',
            
        ]);
        Machines::create([
            'machine_no'=>'22machine',
            'is_active'=>'YES',
            
        ]);
        Machines::create([
            'machine_no'=>'32machine',
            'is_active'=>'YES',
            
        ]);
        Machines::create([
            'machine_no'=>'42machine',
            'is_active'=>'YES',
            
        ]);
        Machines::create([
            'machine_no'=>'52machine',
            'is_active'=>'YES',
            
        ]);
    }
}
