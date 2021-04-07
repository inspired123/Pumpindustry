<?php
namespace cms\news\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use cms\news\Models\NewsModel;

class NewsWebController extends Controller
{
    public function list(Request $request)
    {
        $news = NewsModel::where('status', 1)
        ->orderBy('id', 'DESC')
        ->paginate(15);

        return view('news::site.index',[
            'news' => $news
        ]);
    }
}
