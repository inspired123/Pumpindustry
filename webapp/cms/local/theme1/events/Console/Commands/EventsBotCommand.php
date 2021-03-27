<?php

namespace cms\events\Console\Commands;

use Illuminate\Console\Command;
use cms\events\Models\EventsModel;
use EventsBot;
use Log;
class EventsBotCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update events using bot';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('Cron Job Started for events');
        $bot = new EventsBot;
        $bot->getEventsFromResource(true);
        $eventsArray = $bot->getEvents();
        // print_r($eventsArray);exit;
        foreach ($eventsArray as $key => $events) {
            $old = EventsModel::where('title', $events['title'])->first();
            if($old == null) {
                $obj = new EventsModel;
                $obj->title = $events['title'];
                $obj->short_content = substr($events['short_content'],0, 500);
                $obj->url = $events['url'];
                $obj->event_date = $events['event_date'];
                $obj->event_end_date = $events['event_end_date'];
                $obj->day_count = $events['day_count'];
                $obj->location = $events['location'];
                $obj->source = $events['source'];
                $obj->status = 1;
                $obj->created_by = 1;
                $obj->is_bot = 1;
                $obj->save();
            }
        }

        $this->info('events Update has been send successfully');
        Log::info('Cron Job Ended');
    }
}
