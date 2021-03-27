<?php

namespace cms\news\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use cms\news\Models\NewsModel;
use cms\news\Models\NewsFromResourceModel;
use Yajra\DataTables\Facades\DataTables;
use Session;
use DB;
use CGate;
use User;
use NewsBot;
class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            CGate::resouce('news');
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
        return view('news::admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news::admin.edit',['layout'=>'create']);
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
            'title' => 'required|min:3|max:500|unique:'.(new NewsModel())->getTable().',title',
            'url' => 'required|min:3|max:190',
            'is_video' => 'required',
            'image' => 'required_if:is_video,==,0',
            'status' => 'required',
            'source' => 'required',
        ]);
        $obj = new NewsModel;
        $obj->title = $request->title;
        $obj->url = $request->url;
        if($request->is_video == 1) {
            $obj->short_content = 'Nill';
            $obj->image = 'Nill';
        } else {
            $obj->short_content = $request->short_content;
            $obj->image = $request->image;
        }
        $obj->source = $request->source;
        $obj->status = $request->status;
        $obj->created_by = User::getUser()->id;
        $obj->is_video = $request->is_video;
        $obj->save();

        Session::flash('success','saved successfully');
        return redirect()->route('news.index');
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
        $data = NewsModel::find($id);
        return view('news::admin.edit',['layout'=>'edit','data'=>$data]);
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
            'title' => 'required|min:3|max:500|unique:'.(new NewsModel())->getTable().',title,'.$id,
            'url' => 'required|min:3|max:190',
            'is_video' => 'required',
            'image' => 'required_if:is_video,==,0',
            'status' => 'required',
            'source' => 'required'
        ]);
        $obj = NewsModel::find($id);
        $obj->title = $request->title;
        $obj->url = $request->url;
        if($request->is_video == 1) {
            $obj->short_content = 'Nill';
            $obj->image = 'Nill';
        } else {
            $obj->short_content = $request->short_content;
            $obj->image = $request->image;
        }
        $obj->source = $request->source;
        $obj->status = $request->status;
        $obj->created_by = User::getUser()->id;
        $obj->is_video = $request->is_video;
        $obj->save();

        Session::flash('success','saved successfully');
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        if(!empty($request->selected_news))
        {
            $delObj = new NewsModel;
            foreach ($request->selected_news as $k => $v) {

                if($delItem = $delObj->find($v))
                {
                    $delItem->delete();

                }

            }

        }

        Session::flash("success","data Deleted Successfully!!");
        return redirect()->route("news.index");
    }
    /*
    * get data
    */
    public function getData(Request $request) {
        CGate::authorize('view-news');
        $sTart = ctype_digit($request->get('start')) ? $request->get('start') : 0 ;

        DB::statement(DB::raw('set @rownum='.(int) $sTart));


        $data = NewsModel::select(DB::raw('@rownum  := @rownum  + 1 AS rownum'),"id","title","short_content","image","source","created_at","is_bot","is_video",
            DB::raw('(CASE WHEN '.DB::getTablePrefix().(new NewsModel())->getTable().'.status = "0" THEN "Disabled"
            WHEN '.DB::getTablePrefix().(new NewsModel())->getTable().'.status = "-1" THEN "Trashed"
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
                return '<a class="editbutton btn btn-default" data-toggle="modal" data="'.$data->id.'" href="'.route("news.edit",$data->id).'" ><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>';
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
        CGate::authorize('edit-news');

        if(!empty($request->selected_news))
        {
            $obj = new NewsModel();
            foreach ($request->selected_news as $k => $v) {

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

    public function getNewsFromResource() {
        $newsBot = new NewsBot;
        $newsBot->getNewsFromResource();
        $newsBot->save();

        Session::flash("success","news updated Successfully!!");
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyRnews(Request $request)
    {
        if(!empty($request->selected_news))
        {
            $delObj = new NewsFromResourceModel;
            foreach ($request->selected_news as $k => $v) {

                if($delItem = $delObj->find($v))
                {
                    $delItem->delete();

                }

            }

        }

        Session::flash("success","data Deleted Successfully!!");
        return redirect()->back();
    }


    function rNewsStatusChange(Request $request)
    {
        CGate::authorize('edit-news');

        if(!empty($request->selected_news))
        {
            $obj = new NewsFromResourceModel();
            foreach ($request->selected_news as $k => $v) {

                if($item = $obj->find($v))
                {
                    if($request->action == 1) {
                        $obj = new NewsModel;
                        $obj->title = $item->title;
                        $obj->url = $item->url;
                        $obj->short_content = $item->short_content;
                        $obj->image = $item->image;
                        $obj->source = $item->source;
                        $obj->status = 1;
                        $obj->created_by = User::getUser()->id;
                        $obj->is_video = 0;
                        $obj->save();
                    }

                    $item->status = $request->action;
                    $item->save();

                }

            }

        }

        Session::flash("success","Status changed Successfully!!");
        return redirect()->back();
    }


    /*
    * get data
    */
    public function getResourceNewsData(Request $request) {
        CGate::authorize('view-news');
        $sTart = ctype_digit($request->get('start')) ? $request->get('start') : 0 ;

        DB::statement(DB::raw('set @rownum='.(int) $sTart));


        $data = NewsFromResourceModel::select(DB::raw('@rownum  := @rownum  + 1 AS rownum'),"id","title","short_content","image","source","created_at",
            DB::raw('(CASE WHEN '.DB::getTablePrefix().(new NewsFromResourceModel())->getTable().'.status = "0" THEN "Non Published"
            WHEN '.DB::getTablePrefix().(new NewsFromResourceModel())->getTable().'.status = "-1" THEN "Trashed"
            ELSE "Published" END) AS status'))->where('status', 0);

        $datatables = Datatables::of($data)
            ->addColumn('check', function($data) {
                if($data->id != '1')
                    return $data->rownum;
                else
                    return '';
            });
            // ->addColumn('actdeact', function($data) {
            //     if($data->id != '1'){
            //         $statusbtnvalue=$data->status=="Enabled" ? "<i class='glyphicon glyphicon-remove'></i>&nbsp;&nbsp;Disable" : "<i class='glyphicon glyphicon-ok'></i>&nbsp;&nbsp;Enable";
            //         return '<a class="statusbutton btn btn-default" data-toggle="modal" data="'.$data->id.'" href="">'.$statusbtnvalue.'</a>';
            //     }
            //     else
            //         return '';
            // })
            // ->addColumn('action',function($data){
            //     return '<a class="editbutton btn btn-default" data-toggle="modal" data="'.$data->id.'" href="'.route("news.edit",$data->id).'" ><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>';
            //     //return $data->id;
            // });



        // return $data;
        if(count((array) $data)==0)
            return [];

        return $datatables->make(true);
    }

    public function updateNews() {
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

        Session::flash("success","data updated Successfully!!");
        return redirect()->back();
    }
}
