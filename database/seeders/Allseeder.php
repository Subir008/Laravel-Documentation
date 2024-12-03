<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Allseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $this->call([
            Photoseeder::class,
            StudentSeeder::class,
        ]);
        // $this->callSilent([
        //     Photoseeder::class,
        //     StudentSeeder::class,
        // ]);
        // $this->callOnce([
        //     Photoseeder::class,
        //     StudentSeeder::class,
        // ]);
    }
}
