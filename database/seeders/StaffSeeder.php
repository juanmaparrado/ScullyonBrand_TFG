<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Store;
use App\Models\User;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $storeIds = Store::pluck('id');
        $faker = \Faker\Factory::create();
        Staff::create([
            'name' => 'Ana Castillo',
            'email' => 'anacg@example.com',
            'password' => Hash::make('12345678'),
            'store_id' => 1,
            'salary' => 1000,
            'bank_account' => '1234567890',
            'address' => 'Paquito Gutierrez, Malaga, Spain'
        ]);
        
        for ($i = 0; $i < 10; $i++) {
            Staff::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('12345678'),
                'store_id' => $faker->randomElement($storeIds),
                'salary' => $faker->numberBetween(1000, 5000),
                'bank_account' => $faker->bankAccountNumber(),
                'address' => $faker->address()
            ]);
        }

        Staff::all()->each(function ($staff) {
            User::create([
                'name' => $staff->name,
                'email' => $staff->email,
                'password' => $staff->password,
            ])->assignRole('staff');
        });


    }
}
