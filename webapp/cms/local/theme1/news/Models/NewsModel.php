<?php

namespace cms\news\Models;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    public function likes() {
    	return $this->hasMany('cms\news\Models\LikesModel','news_id','id');
    }

    public function views() {
    	return $this->hasMany('cms\news\Models\ViewsModel','news_id','id');
    }

    public function comments() {
    	return $this->hasMany('cms\news\Models\CommentsModel','news_id','id');
    }

    public function fav() {
    	return $this->hasMany('cms\news\Models\FavouriteNewsModel','news_id','id');
    }
}
