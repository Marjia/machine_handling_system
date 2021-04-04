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
            'machine_no'=>'M-12',
            'is_active'=>'YES',
            'created_by' => '2',

        ]);
        Machines::create([
            'machine_no'=>'M-22',
            'is_active'=> "YES",
            'created_by' => '2',
        ]);
        Machines::create([
            'machine_no'=>'M-32',
            'is_active'=> "YES",
            'created_by' => '2',
        ]);
        Machines::create([
            'machine_no'=>'M-42',
            'is_active'=> "YES",
            'created_by' => '2',
        ]);
        Machines::create([
            'machine_no'=>'M-52',
            'is_active'=> "YES",
            'created_by' => '2',
        ]);
    }
}
