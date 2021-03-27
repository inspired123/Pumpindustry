<?php

namespace cms\news\Console\Commands;

use Illuminate\Console\Command;
use cms\news\Models\NewsModel;
use NewsBot;
use Log;
class NewsBotCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update news using bot';

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
        Log::info('Cron Job Started');
        $bot = new NewsBot;
        $bot->getNewsFromResource(true);
        $newsArray = $bot->getNews();
        foreach ($newsArray as $key => $news) {
            $old = NewsModel::where('title', $news['title'])->first();
            if($old == null) {
                $obj = new NewsModel;
                $obj->title = $news['title'];
                $obj->short_content = substr($news['short_content'],0, 500);
                $obj->url = $news['url'];
                $obj->image = $news['image'];
                $obj->source = $news['source'];
                $obj->status = 1;
                $obj->created_by = 1;
                $obj->is_bot = 1;
                $obj->save();
            }
        }

        $this->info('news Update has been send successfully');
        Log::info('Cron Job Ended');
    }
}
