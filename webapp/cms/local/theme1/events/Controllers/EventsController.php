<?php

namespace cms\events\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use cms\events\Models\EventsModel;

use Yajra\DataTables\Facades\DataTables;


use Session;
use DB;
use CGate;
use User;
use DateTime;

class EventsController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            CGate::resouce('events');
            return $next($request);
        });

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events::admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events::admin.edit',['layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:3|max:50|unique:'.(new EventsModel())->getTable().',title',
            'short_content' => 'required|max:500',
            'event_date' => 'required|date',
            'location' => 'required',
            'source' => 'required',
            'url' => 'required',
            'day_count' => 'required',
            'status' => 'required',
        ]);

        $date = new DateTime($request->event_date);
        $date->modify('+'.$request->day_count.' day');
        $endDate = $date->format('Y-m-d');

        $obj = new EventsModel;
        $obj->title = $request->title;
        $obj->short_content = $request->short_content;
        $obj->event_date = date_format(date_create($request->event_date),"Y-m-d");
        $obj->event_end_date = $endDate;
        $obj->location = $request->location;
        $obj->source = $request->source;
        $obj->url = $request->url;
        $obj->day_count = $request->day_count;
        $obj->created_by = User::getUser()->id;
        $obj->status = $request->status;
        $obj->save();

        Session::flash('success','saved successfully');
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = EventsModel::find($id);
        return view('events::admin.edit',['layout'=>'edit','data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|min:3|max:50|unique:'.(new EventsModel())->getTable().',title,'.$id,
            'short_content' => 'required|max:500',
            'event_date' => 'required|date',
            'location' => 'required',
            'source' => 'required',
            'url' => 'required',
            'day_count' => 'required',
            'status' => 'required',
        ]);
        $date = new DateTime($request->event_date);
        $date->modify('+'.$request->day_count.' day');
        $endDate = $date->format('Y-m-d');

        $obj = EventsModel::find($id);
        $obj->title = $request->title;
        $obj->short_content = $request->short_content;
        $obj->event_date = date_format(date_create($request->event_date),"Y-m-d");
        $obj->event_end_date = $endDate;
        $obj->location = $request->location;
        $obj->source = $request->source;
        $obj->url = $request->url;
        $obj->day_count = $request->day_count;
        $obj->created_by = User::getUser()->id;
        $obj->status = $request->status;
        $obj->save();

        Session::flash('success','saved successfully');
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        if(!empty($request->selected_events))
        {
            $delObj = new EventsModel;
            foreach ($request->selected_events as $k => $v) {

                if($delItem = $delObj->find($v))
                {
                    $delItem->delete();

                }

            }

        }

        Session::flash("success","data Deleted Successfully!!");
        return redirect()->route("events.index");
    }
    /*
    * get data
    */
    public function getData(Request $request) {
        CGate::authorize('view-events');
        $sTart = ctype_digit($request->get('start')) ? $request->get('start') : 0 ;

        DB::statement(DB::raw('set @rownum='.(int) $sTart));


        $data = EventsModel::select(DB::raw('@rownum  := @rownum  + 1 AS rownum'),"id","title","short_content","event_date","location",
            DB::raw('(CASE WHEN '.DB::getTablePrefix().(new EventsModel())->getTable().'.status = "0" THEN "Disabled"
            WHEN '.DB::getTablePrefix().(new EventsModel())->getTable().'.status = "-1" THEN "Trashed"
            ELSE "Enabled" END) AS status'));

        $datatables = Datatables::of($data)
            ->addColumn('check', function($data) {
                if($data->id != '1')
                    return $data->rownum;
                else
                    return '';
            })
            ->addColumn('actdeact', function($data) {
                if($data->id != '1'){
                    $statusbtnvalue=$data->status=="Enabled" ? "<i class='glyphicon glyphicon-remove'></i>&nbsp;&nbsp;Disable" : "<i class='glyphicon glyphicon-ok'></i>&nbsp;&nbsp;Enable";
                    return '<a class="statusbutton btn btn-default" data-toggle="modal" data="'.$data->id.'" href="">'.$statusbtnvalue.'</a>';
                }
                else
                    return '';
            })
            ->addColumn('action',function($data){
                return '<a class="editbutton btn btn-default" data-toggle="modal" data="'.$data->id.'" href="'.route("events.edit",$data->id).'" ><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>';
                //return $data->id;
            });



        // return $data;
        if(count((array) $data)==0)
            return [];

        return $datatables->make(true);
    }

    /*
     * country bulk action
     * eg : trash,enabled,disabled
     * delete is destroy function
     */
    function statusChange(Request $request)
    {
        CGate::authorize('edit-events');

        if(!empty($request->selected_events))
        {
            $obj = new EventsModel();
            foreach ($request->selected_events as $k => $v) {

                if($item = $obj->find($v))
                {
                    $item->status = $request->action;
                    $item->save();

                }

            }

        }

        Session::flash("success","Status changed Successfully!!");
        return redirect()->back();
    }

}
