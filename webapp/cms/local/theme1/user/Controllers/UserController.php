<?php

namespace cms\user\Controllers;

use Illuminate\Http\Request;
use cms\user\Controllers\ApiController as Controller;

use cms\user\Models\UserDetailsModel;
use cms\user\Models\UserModel;
use cms\token\Models\TokenModel;
use cms\core\usergroup\Models\UserGroupMapModel;
use Token;
use Hash;
use Validator;
class UserController extends Controller
{
   /*
    * login
    */ 
   public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'source_ref_id' => 'required',
            'source' => 'required',
            'username' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

        $userDetails = UserDetailsModel::whereHas('user')->where('source_ref_id',$request->source_ref_id)
            ->where('source',$request->source)
            ->first();

        if(!isset($userDetails)) {
            $userCount = UserModel::where('username',$request->username)->count();

            $user = new UserModel;
            $user->name = $request->username;
            $user->username = $userCount == 0 ? $request->username : $request->username.uniqid();
            $user->email = $request->email;
            $user->password = Hash::make($request->username . uniqid());
            $user->save();

            $userDetails = new UserDetailsModel;
            $userDetails->source_ref_id = $request->source_ref_id;
            $userDetails->source = $request->source;
            $userDetails->user_id = $user->id;
            $userDetails->save();

            $usertypemap = new UserGroupMapModel;
            $usertypemap->user_id = $user->id;
            $usertypemap->group_id    = 2;
            $usertypemap->save();

        } else {
            $user = $userDetails->user;
        }

        $token = Token::generateToken(); 
        $tokenModel = TokenModel::firstOrNew(['user_id' => $user->id,'type'=>'auth']);
        $tokenModel->user_id = $user->id;
        $tokenModel->value = $token;
        $tokenModel->type = "auth";
        $tokenModel->save();

        return $this->sendResponse(1,200,['userDetails' => $userDetails,'user' => $user,'token' => $token]);

   }

   /*
    * change profile
    */
   public function updateProfile(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

        $user_id = $request->_user->id;
        $user = UserModel::find($user_id);
        $user->name = $request->name;
        $user->save();

        return $this->sendResponse(1,200,[]);
   }
}
