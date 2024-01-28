<?php

namespace Database\Seeders;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = Event::all();
        foreach (User::all() as $user) {
            foreach ($events->random(rand(2, 6)) as $event) {
                Attendee::create([
                    'user_id' => $user->id,
                    'status' => array_rand([Attendee::$attending, Attendee::$maybeAttending]),
                    'event_id' => $event->id,
                ]);
            }
        }
    }
}
