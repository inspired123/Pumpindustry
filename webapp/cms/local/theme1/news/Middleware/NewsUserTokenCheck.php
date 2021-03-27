<?php

namespace cms\news\Middleware;

use Closure;

class NewsUserTokenCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!isset($request->_token) || $request->_token !== "this_is_unkown_user_token") {
            return response()->json(['status' => 0,'code'=>401,"data"=>["dummy" => ""],"message"=>"unauthorized user"],401);
        }
        return $next($request);
    }
}
