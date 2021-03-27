<?php
namespace cms\news\Controllers;

use Illuminate\Http\Request;
use cms\user\Controllers\ApiController as Controller;

use cms\news\Models\NewsModel;
use cms\news\Models\LikesModel;
use cms\news\Models\ViewsModel;
use cms\news\Models\FavouriteNewsModel;
use cms\news\Models\CommentsModel;
use cms\news\Models\CommentsReply;
use cms\user\Models\NotificationTokensModel;
use cms\token\Models\TokenModel;

use Validator;
use Configurations;
class NewsApiController extends Controller
{
	/*
	 * flash 
	 */
	public function flashApi(Request $request) {
        $firebase_token = $request->header('firebase_token');
        $notificationToken = NotificationTokensModel::where('token',$firebase_token)->count();
        if($notificationToken == 0 && $firebase_token) {
            $user_id = 0;
            if(isset($request->_token)) {
                $token = TokenModel::
                with('user')->where('value',$request->_token)
                ->first();

                if($token) {
                    $user_id = $token->user_id;
                }
            }
            $notificationToken = new NotificationTokensModel;
            $notificationToken->token = $firebase_token;
            $notificationToken->user_id = $user_id;
            $notificationToken->save();
        } else if($firebase_token) {
            $user_id = 0;
            if(isset($request->_token)) {
                $token = TokenModel::
                with('user')->where('value',$request->_token)
                ->first();
                
                if($token) {
                    $user_id = $token->user_id;
                }
            }
            $notificationToken = NotificationTokensModel::where('token',$firebase_token)->first();
            $notificationToken->token = $firebase_token;
            $notificationToken->user_id = $user_id;
            $notificationToken->save();
        }
		return $this->sendResponse(1,200,[
			'APP_VERSION' => '1.2.8',
			'UNKNOWN_USER_TOKEN' => 'this_is_unkown_user_token'
		]);
	}
    /*
     * get news
     */
    public function getNews(Request $request) {
    	$user_id = $request->_user->id ?? 0;
        $is_video = (isset($request->is_video) && $request->is_video == 1) ? 1 : 0;

        $limit = isset(Configurations::getConfig('site')->news_limit) ? (int) Configurations::getConfig('site')->news_limit : 100;

    	$news = NewsModel::
    		withCount('views')
    		->withCount(['likes' => function($q) {
    			return $q->where('status', 1);
    		}])
    		->withCount(['likes as dis_liskes_count' => function($q) {
    			return $q->where('status', 2);
    		}])
            ->withCount('comments')
    		->with(['likes' => function($q) use ($user_id) {
    			return $q->where('user_id', $user_id);
    		}, 'views' => function($q) use ($user_id) {
    			return $q->where('user_id', $user_id);
    		}, 'fav' => function($q) use ($user_id) {
                return $q->where('user_id', $user_id);
            }])
    		->where('status',1)
            ->where('is_video',$is_video)
    		->orderBy('id','desc')->paginate($limit);

    	return $this->sendResponse(1,200,['news' => $news]);

    }
    /*
     * like action
     */
    public function likeAction(Request $request) {

    	$validator = Validator::make($request->all(), [
            'status' => 'required', 
            'news_id' => 'required|exists:'.(new NewsModel())->getTable().',id',
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

    	$like = LikesModel::where('news_id',$request->news_id)->where('user_id',$request->_user->id)->first();
    	if($like === null) {
    		$like = new LikesModel;
    	}
    	$like->news_id = $request->news_id;
    	$like->user_id = $request->_user->id;
    	$like->status  = $request->status;
    	if($like->save()) {
    		return $this->sendResponse(1,200,[]);
    	} else {
    		return $this->sendResponse(0,200,[]);
    	}
    }


    /*
     * view action
     */
    public function viewsAction(Request $request) {

    	$validator = Validator::make($request->all(), [
            'news_id' => 'required|exists:'.(new NewsModel())->getTable().',id',
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

        $appId = 0;
        if($request->headers->has('appId')) {
            $appId = $request->header('appId');
        }

    	$views = ViewsModel::where('news_id',$request->news_id)->where('user_id',$request->_user->id)
        ->where('appId',$appId)->first();
    	if($views === null) {
    		$views = new ViewsModel;
    	}
    	$views->news_id = $request->news_id;
    	$views->user_id = $request->_user->id;
        $views->appId = $appId;
    	$views->status  = 1;
    	if($views->save()) {
    		return $this->sendResponse(1,200,[]);
    	} else {
    		return $this->sendResponse(0,200,[]);
    	}
    }

    /*
     * share action
     */
    public function shareAction(Request $request) {

    	$validator = Validator::make($request->all(), [
            'news_id' => 'required|exists:'.(new NewsModel())->getTable().',id',
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

        $news = NewsModel::find($request->news_id);
        $news->share_count = $news->share_count+1;
        if($news->save()) {
        	return $this->sendResponse(1,200,[]);
    	} else {
    		return $this->sendResponse(0,200,[],"something went wrong");
    	}
    }

    /*
     * add to fav
     */
    public function favAction(Request $request) {
        $validator = Validator::make($request->all(), [
            'news_id' => 'required|exists:'.(new NewsModel())->getTable().',id',
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

        $fav = FavouriteNewsModel::where('news_id',$request->news_id)->where('user_id',$request->_user->id)->first();
        if($fav !== null) {
            $fav->delete();
            return $this->sendResponse(1,200,[],"removed");
        }
        $fav = new FavouriteNewsModel;
        $fav->news_id = $request->news_id;
        $fav->user_id = $request->_user->id;
        if($fav->save()) {
            return $this->sendResponse(1,200,[],"added");
        } else {
            return $this->sendResponse(0,200,[],"something went wrong");
        }
    }

    /*
     * add comment
     */
    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'news_id' => 'required|exists:'.(new NewsModel())->getTable().',id',
            'comment' => 'required'
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

        $comment = new CommentsModel;
        $comment->news_id = $request->news_id;
        $comment->user_id = $request->_user->id;
        $comment->comment = $request->comment;
        if($comment->save()) {
            return $this->sendResponse(1,200,[],"added");
        } else {
            return $this->sendResponse(0,200,[],"something went wrong");
        }
    }

    /*
     * remove comment
     */
    public function removeComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment_id' => 'required|exists:'.(new CommentsModel())->getTable().',id',
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

        $comment = CommentsModel::find($request->comment_id);
        if($comment !== null) {
            $comment->delete();
            return $this->sendResponse(1,200,[],"removed");
        } else {
            return $this->sendResponse(0,200,[],"something went wrong");
        }
    }

    /*
     * add reply
     */
    public function addReply(Request $request) {
        $validator = Validator::make($request->all(), [
            'comment_id' => 'required|exists:'.(new CommentsModel())->getTable().',id',
            'comment' => 'required'
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

        $reply = new CommentsReply;
        $reply->user_id = $request->_user->id;
        $reply->comment_id = $request->comment_id;
        $reply->comment = $request->comment;
        if($reply->save()) {
            return $this->sendResponse(1,200,[],"added");
        } else {
            return $this->sendResponse(0,200,[],"something went wrong");
        }

    }

    /*
     * remove reply
     */
    public function removeReply(Request $request) {
        $validator = Validator::make($request->all(), [
            'reply_id' => 'required|exists:'.(new CommentsReply())->getTable().',id',
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

        $reply = CommentsReply::find($request->reply_id);
        if($reply !== null) {
            $reply->delete();
            return $this->sendResponse(1,200,[],"removed");
        } else {
            return $this->sendResponse(0,200,[],"something went wrong");
        }
    }
    
    /*
     * get comments
     */
    public function getComments(Request $request) {
        $validator = Validator::make($request->all(), [
            'news_id' => 'required|exists:'.(new NewsModel())->getTable().',id',
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

        $comments = CommentsModel::with('user')->where('news_id',$request->news_id)->withCount('reply')->get();

        return $this->sendResponse(1,200,['comments' => $comments]);

    }

    /*
     * get replys
     */
    public function getReplys(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment_id' => 'required|exists:'.(new CommentsModel())->getTable().',id',
        ]);

        if ($validator->fails()) {
            $message = $validator->messages();
            return $this->sendResponse(0,400,$message,"invalid data");
        }

        $replys = CommentsReply::with('user')->where('comment_id',$request->comment_id)->get();

        return $this->sendResponse(1,200,['replys' => $replys]);
    }

    /*
     * get fav
     */
    public function getFavs(Request $request)
    {
        $user_id = $request->_user->id ?? 0;
        $fav = FavouriteNewsModel::with(['news' => function($q) use ($user_id) {
            $q->withCount('views')
            ->withCount(['likes' => function($q) {
                return $q->where('status', 1);
            }])
            ->withCount(['likes as dis_liskes_count' => function($q) {
                return $q->where('status', 2);
            }])
            ->withCount('comments')
            ->with(['likes' => function($q) use ($user_id) {
                return $q->where('user_id', $user_id);
            }, 'views' => function($q) use ($user_id) {
                return $q->where('user_id', $user_id);
            }]);
            //->where('status',1);
        }])->where('user_id',$request->_user->id)->get();

        return $this->sendResponse(1,200,['fav' => $fav]);
    }
}
