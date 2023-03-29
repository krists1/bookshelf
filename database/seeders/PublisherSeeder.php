<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publisher::create([
            'name' => 'Zvaigzne ABC',
            'country' => 'Latvija',
            'founded' => 1930,
            'active' => true
        ]);

        Publisher::factory()
            ->count(10)
            ->create();
    }
}
