<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Group;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = Group::all();
        foreach (range(1, 30) as $i) {
            $group = $groups->random();
            Event::factory()->create([
                'group_id' => $group->id,
            ]);
        }
    }
}