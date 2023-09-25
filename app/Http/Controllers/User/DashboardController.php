<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Usermonthlybid;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $monthsale = Usermonthlybid::all();
        $urBg = Auth::user();
        $userid = $urBg->id;
        $currentMonth = date('m');
        $users = DB::table('usermonthlybid')
            ->where('userid', '=', $urBg->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_bus');
        $lastMonth = DB::table('usermonthlybid')
            ->where('userid', '=', $urBg->id)
            ->whereBetween(
                'created_at',
                [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
            )
            ->sum('total_bus');
        $totalSale = DB::table('usermonthlybid')
            ->where('userid', '=', $urBg->id)
            ->sum('total_bus');
        return view('user.dashboard', compact('users', 'userid', 'lastMonth', 'totalSale'));
    }
}
