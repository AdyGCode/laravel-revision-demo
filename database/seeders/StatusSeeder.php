<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedStatuses = [
            [
                'name' => 'Unknown',
                'description' => 'Unknown status for this item, please verify',
            ],
            [
                'name' => 'New',
                'description' => 'New item in list',
            ],
            [
                'name' => 'In Progress',
                'description' => 'Currently being worked upon',
            ],
            [
                'name' => 'Completed',
                'description' => 'Item has been completed.',
            ],
        ];

        foreach ($seedStatuses as $newStatus) {
            Status::create($newStatus);
        }

    }
}
