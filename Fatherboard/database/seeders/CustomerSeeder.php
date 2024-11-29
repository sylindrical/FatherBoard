<?php

namespace Database\Seeders;

use App\Models\CustomerInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $userAmount=15, int $addressPerUser=2): void
    {
        CustomerInformation::factory($userAmount)->hasAddr($addressPerUser)->create([]);
    }
}
