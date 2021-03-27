<?php
namespace cms\token\Helpers;
/**
 * Created by PhpStorm.
 * User: r.shunmugam
 * Date: 19/03/19
 * Time: 6:43 PM
 */

class Tokens
{
    static function generateToken() {
        return md5(uniqid(rand(), true));
    }
}