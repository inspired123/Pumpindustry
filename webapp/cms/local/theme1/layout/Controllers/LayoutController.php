<?php

namespace cms\layout\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use cms\news\Models\NewsModel;
use cms\events\Models\EventsModel;
use cms\core\blog\Models\BlogModel;
use Carbon\Carbon;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage()
    {
        $events = EventsModel::whereDate('event_date','>=',Carbon::now())
            ->where('status', 1)
            ->orderBy('event_date', 'ASC')
            ->take(3)->get();
        
        if(count((array) $events) == 0) {
            $events = EventsModel::where('status', 1)->orderBy('event_date', 'ASC')->take(3)->get();
        }
        $news = NewsModel::orderBy('id','DESC')->where('status', 1)->take(6)->get();
        $blogs = BlogModel::orderBy('id','DESC')->where('status', 1)->take(6)->get();
        
        return view('layout::site.welcome',['news' => $news, 'events' => $events, 'blogs' => $blogs]);
    }

    /**
     * Display a contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactPage()
    {
        return view('layout::site.contact');
    }
    /**
     * Display a details of the blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogDetailsPage($id)
    {
        $blog = BlogModel::where('status', 1)
        ->find($id);
        
        return view('layout::site.blog',['blog' => $blog]);
    }

    public function contactPageAction(Request $request) {
        return redirect()->back();
    }
}
