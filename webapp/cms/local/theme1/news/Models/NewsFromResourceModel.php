<?php

namespace cms\news\Models;

use Illuminate\Database\Eloquent\Model;

class NewsFromResourceModel extends Model
{
    protected $table = 'news_from_resource';

    protected $fillable = ['title'];
}
