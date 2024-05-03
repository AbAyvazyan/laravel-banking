<?php

namespace App\Console\Commands;

use Database\Seeders\BookedSeatsSeeder;
use Database\Seeders\MoviesSeeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\SchedulesSeeder;
use Illuminate\Console\Command;

class RunSeeders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-seeders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call(MoviesSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(SchedulesSeeder::class);
        $this->call(BookedSeatsSeeder::class);
    }
}
