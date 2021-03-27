<?php

namespace cms\news\Console\Commands;

use Illuminate\Console\Command;
use cms\news\Models\NewsModel;
use cms\news\Mail\AlertMail;
use NewsBot;
use Log;
use DB;
use Mail;
class MailAlertCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alert:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Alert mail to admins';

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
        Log::info('Alert Mail Cron Job Started');
        $counts = NewsModel::select('source', DB::raw('count(*) as total'))
                ->whereDate('created_at','=',date("Y-m-d"))
                ->groupBy('source')
                ->get();

        \CmsMail::setMailConfig();
        $emails = ['shunramit@gmail.com', 'sachinvarmaraja@gmail.com',];

        Mail::to($emails)->send(new AlertMail($counts));

    }
}
