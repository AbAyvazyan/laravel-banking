<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the ID of the first movie and room
        $movieId = DB::table('movies')->pluck('id')->first();
        $roomId = DB::table('rooms')->pluck('id')->first();

        // Define the start times for the schedules
        $startTimes = [
            Carbon::today()->setTime(9, 0),  // 9:00 AM
            Carbon::today()->setTime(12, 0), // 12:00 PM
            Carbon::today()->setTime(15, 0), // 3:00 PM
            Carbon::today()->setTime(18, 0), // 6:00 PM
        ];

        // Create a schedule for each start time
        foreach ($startTimes as $startTime) {
            DB::table('schedules')->insert([
                'movie_id' => $movieId,
                'room_id' => $roomId,
                'start_time' => $startTime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'end_time' => $startTime->copy()->addHours(2), // Assume the movie lasts 2 hours
            ]);
        }
    }
}
