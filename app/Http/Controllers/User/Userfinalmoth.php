<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Userfinalmonthreport;
use Illuminate\Support\Facades\Auth;

class Userfinalmoth extends Controller
{
    public function sumbitData(Request $request)
    {
        $userbid = new Userfinalmonthreport();
        Auth::user();
        $my = date('F Y');
        $userbid->userid = $request->user()->id;
        $userbid->client_name = $request->user()->name;
        $userbid->month_name = $my;
        $userbid->total_bus = $request->budget;
        $userbid->bus_target = $request->user()->budget;
        $userbid->save();

        return redirect('user/month-report')->with('message', 'Reports  created successfully');
    }
}
