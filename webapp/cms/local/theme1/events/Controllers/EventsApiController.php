<?php
namespace cms\events\Controllers;

use Illuminate\Http\Request;
use cms\user\Controllers\ApiController as Controller;
use cms\events\Models\EventsModel;
use Carbon\Carbon;
use Configurations;

class EventsApiController extends Controller
{
    /*
     * get events
     */
    public function getEvents(Request $request) {

        $limit = isset(Configurations::getConfig('site')->news_limit) ? (int) Configurations::getConfig('site')->news_limit : 100;

    	$events = EventsModel::
    		where('status',1)
            ->where(function($q) {
                $q->whereDate('event_date','>=',Carbon::now())
                ->orWhereDate('event_end_date','>=',Carbon::now());
            })
    		
            ->orderBy('event_date', 'ASC')
            ->paginate($limit);

    	return $this->sendResponse(1,200,['events' => $events]);

    }
}
