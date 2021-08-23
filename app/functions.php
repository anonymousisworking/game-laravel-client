<?php

use Illuminate\Support\Facades\Redis;

function generateToken() {
    $token = generateRandomString();
    Redis::set('socket:' . $token, $_COOKIE['PHPSESSID'], 10);

    return $token;
}


function generateRandomString($length = 20) {
    return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 3)), 0, $length);
}
