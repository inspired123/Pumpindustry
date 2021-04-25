<?php

namespace cms\blog\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use cms\core\blog\Models\BlogModel;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $blogs = BlogModel::where('status', 1)
        ->orderBy('id', 'DESC')
        ->paginate(15);
        
        return view('blog::site.index',['blogs' => $blogs]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = BlogModel::findOrFail($id);
        return view('blog::site.blog',['blog' => $blog]);
    }
}
