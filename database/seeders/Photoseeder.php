<?php

namespace Database\Seeders;

use App\Models\photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Photoseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        photo::insert([
            'name'=> Str::random(5)
        ]);
    }
}
