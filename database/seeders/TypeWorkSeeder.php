<?php

namespace Database\Seeders;

use App\Models\TypeWork;
use Illuminate\Database\Seeder;

class TypeWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TypeWork::create([
            'name' => 'Remote',
        ]);

        TypeWork::create([
            'name' => 'Full-time',
        ]);

        TypeWork::create([
            'name' => 'Part-time',
        ]);
    }
}
