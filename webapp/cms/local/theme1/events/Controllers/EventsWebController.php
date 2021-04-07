<?php
namespace cms\events\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use cms\events\Models\EventsModel;
use Carbon\Carbon;

class EventsWebController extends Controller
{
    public function list(Request $request) {
        $events = EventsModel::where('status', 1)
        ->whereDate('event_date','>=',Carbon::now())
        ->orderBy('event_date', 'ASC')
        ->paginate(15);

        return view('events::site.index',[
            'events' => $events
        ]);
    }
}
