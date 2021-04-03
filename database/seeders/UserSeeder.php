<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        USER::create([
            'first_name'=>'coco',
            'last_name'=>'spencer',
            'name' => 'coco',
            'company_name'=>'spencer company',
            'email' => 'coco@gmail.com',
            'is_active'=>'YES',
            'is_admin'=>'YES',
            'address'=>'New Road ,New House',
            'tax_reg_no'=>'987',
            'phone_number'=>'098',
            'password' => Hash::make('1234'),
        ]);

        USER::create([
            'first_name'=>'Marco',
            'last_name'=>'spencer',
            'name' => 'marco',
            'company_name'=>'spencer company',
            'email' => 'marco@gmail.com',
            'is_active'=>'YES',
            'is_admin'=>'NO',
            'address'=>'New Road ,New House',
            'tax_reg_no'=>'987',
            'phone_number'=>'098',
            'password' => Hash::make('1234'),
        ]);

        USER::create([
            'first_name'=>'coco',
            'last_name'=>'spencer',
            'name' => 'Rafe',
            'company_name'=>'spencer company',
            'email' => 'rafe@gmail.com',
            'is_active'=>'YES',
            'is_admin'=>'YES',
            'address'=>'New Road ,New House',
            'tax_reg_no'=>'987',
            'phone_number'=>'098',
            'password' => Hash::make('1234'),
        ]);

        USER::create([
            'first_name'=>'coco',
            'last_name'=>'spencer',
            'name' => 'Saphire',
            'company_name'=>'spencer company',
            'email' => 'clair@gmail.com',
            'is_active'=>'YES',
            'is_admin'=>'YES',
            'address'=>'New Road ,New House',
            'tax_reg_no'=>'987',
            'phone_number'=>'098',
            'password' => Hash::make('1234'),
        ]);

        USER::create([
            'first_name'=>'coco',
            'last_name'=>'spencer',
            'name' => 'Ruby',
            'company_name'=>'spencer company',
            'email' => 'ruby@gmail.com',
            'is_active'=>'YES',
            'is_admin'=>'NO',
            'address'=>'New Road ,New House',
            'tax_reg_no'=>'987',
            'phone_number'=>'098',
            'password' => Hash::make('1234'),
        ]);
    }
}
