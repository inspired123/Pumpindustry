<?php

namespace cms\user\Middleware;

use Closure;
use cms\token\Models\TokenModel;

class UserAuthForApi
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
        if(!isset($request->_token)) {
            return response()->json(['status' => 0,'code'=>401,"data"=>["dummy" => ""],"message"=>"unauthorized user"],401);
        }
        $token = TokenModel::
                 with('user')
                ->where('value',$request->_token)->first();
        if(count((array) $token) == 0) {
            return response()->json(['status' => 0,'code'=>401,"data"=>["dummy" => ""],"message"=>"unauthorized user"],401);
        }

        $request->_user = $token->user;
        return $next($request);
    }
}
