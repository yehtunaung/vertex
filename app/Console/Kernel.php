<?php

namespace App\Console;

use App\Models\RoomCategory;
use App\Models\Room;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // clean trash data after 30 day restore
        $schedule->call(function(){

            $day = now()->subDays(30)->toDateTimeString();
            // clean room trash
            $rooms = Room::whereNotNull("deleted_at")
            ->where("deleted_at", "<=", $day)
            ->get();

            $rooms->each->forceDelete();

            // clean room category
            $roomCategories = RoomCategory::whereNotNull("deleted_at")
            ->where("delete_at","<=",$day)
            ->get();

            foreach($roomCategories as $roomCategory){
                if(Storage::exists("public/rooms/".$roomCategory->room_img)){
                    Storage::delete("public/rooms/".$roomCategory->room_img);
                }

                $roomCategory->forceDelete();
            }
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
