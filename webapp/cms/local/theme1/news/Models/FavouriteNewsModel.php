<?php

namespace cms\news\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteNewsModel extends Model
{
    protected $table = "favourite_news";

    public function news()
    {
    	return $this->hasOne('cms\news\Models\NewsModel','id','news_id');
    }
}
