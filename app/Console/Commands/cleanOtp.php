<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schedule;

class cleanOtp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'otp:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean Otp database, remove all old otps that is expired or used.';

    /**
     * Execute the console command.
     */
    public function handle(Schedule $schedule)
    {
        $schedule->command('otp:clean')->daily();
    }
}
