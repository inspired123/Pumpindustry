<?php

namespace cms\user\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetailsModel extends Model
{
    protected $table = "user_details";

    public function user() {
        return $this->hasOne("cms\user\Models\UserModel",'id','user_id');
    }
}
