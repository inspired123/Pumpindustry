<?php

namespace cms\token\Models;

use Illuminate\Database\Eloquent\Model;

class TokenModel extends Model
{
    protected $table = "tokens";

    protected $casts = [
        'ext' => 'array'
    ];

    protected $fillable = ["user_id"];

    public function user() {
        return $this->hasOne("cms\user\Models\UserModel",'id','user_id');
    }
}
