<?php

namespace cms\news\Models;

use Illuminate\Database\Eloquent\Model;

class CommentsReply extends Model
{
    protected $table = "comments_reply";

    public function user()
    {
    	return $this->hasOne("cms\user\Models\UserModel",'id','user_id');
    }
}
