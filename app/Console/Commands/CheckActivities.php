<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckActivities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-activities';

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
        $activities = \App\Models\Activity::all();
        
        if ($activities->isEmpty()) {
            $this->info('No activities found in database.');
            return;
        }
        
        $this->info('Activities in database:');
        foreach ($activities as $activity) {
            $this->line("- Title: {$activity->title_th}");
            $this->line("  Image: {$activity->image_path}");
            $this->line("  Date: {$activity->activity_date}");
            $this->line("");
        }
    }
}
