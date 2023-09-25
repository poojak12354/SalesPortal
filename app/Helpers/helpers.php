<?php

use Illuminate\Support\Facades\DB;

/**
 * Write code on Method
 *
 * @return response()
 */
function notificationBell()
{
    $usersnotification = DB::table('usersfinalmonth')->where('read_status', '0')->get();
    $usersnot = DB::table('usersfinalmonth')->take(10)->get();
    return array($usersnotification, $usersnot);
}
