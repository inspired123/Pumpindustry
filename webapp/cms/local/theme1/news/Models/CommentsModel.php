<?php

namespace cms\news\Models;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    protected $table = "comments";

    public function user()
    {
    	return $this->hasOne("cms\user\Models\UserModel",'id','user_id');
    }

    public function reply() {
    	return $this->hasMany('cms\news\Models\CommentsReply','comment_id','id');
    }
}
