<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Customer::create([
            'name' => 'Customer Name',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('customer@gmail.com'),
        ]);
    }
}
