<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Usermonthlybid;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Userfinalmoth;
use App\Models\Userfinalmonthreport;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // User final report
        $userfinal = Userfinalmonthreport::all();
        $username = DB::table('users')->get();
        //
        $monthsale = Usermonthlybid::all();
        $urBg = Auth::user();
        $userid = $urBg->id;
        $currentMonth = date('m');
        // GRAPH SETTING
        $users = User::join('usersfinalmonth', 'users.id', '=', 'usersfinalmonth.userid')
            ->pluck('usersfinalmonth.total_bus', 'users.name', 'users.budget');

        $labels = $users->keys();
        $data = $users->values();
        // CLOSE GRAPH SETTINGS
        $users = DB::table('usermonthlybid')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_bus');
        $lastMonth = DB::table('usermonthlybid')
            ->whereBetween(
                'created_at',
                [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
            )
            ->sum('total_bus');
        $lms = DB::table('usersfinalmonth')->select('*')
            ->whereBetween(
                'created_at',
                [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
            )
            ->get();
        return view('admin.dashboard', compact('users', 'lastMonth', 'userfinal', 'username', 'monthsale', 'labels', 'data', 'lms'));
    }
    public function updateVerify($final_id, $select_id)
    {
        // User final report
        $userfinal = Userfinalmonthreport::all();
        $username = DB::table('users')->get();
        //
        $monthsale = Usermonthlybid::all();
        $urBg = Auth::user();
        $userid = $urBg->id;
        $currentMonth = date('m');
        $users = DB::table('usermonthlybid')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_bus');
        $lastMonth = DB::table('usermonthlybid')
            ->whereBetween(
                'created_at',
                [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
            )
            ->sum('total_bus');

        $userfinal = Userfinalmonthreport::all();

        $updateverifyreport = DB::table('usersfinalmonth')
            ->where('id', $final_id)
            ->update(['verify_report' => $select_id]);
        return redirect('admin/dashboard');
        //return view('admin.dashboard', compact('users', 'lastMonth', 'userfinal', 'username'));
    }
    public function search(Request $request)
    {
        // User final report
        $userfinal = Userfinalmonthreport::all();
        $username = DB::table('users')->get();
        //
        $monthsale = Usermonthlybid::all();
        $urBg = Auth::user();
        $userid = $urBg->id;
        $currentMonth = date('m');
        // GRAPH SETTING
        $users = User::join('usersfinalmonth', 'users.id', '=', 'usersfinalmonth.userid')
            ->pluck('usersfinalmonth.total_bus', 'users.name', 'users.budget');

        $labels = $users->keys();
        $data = $users->values();
        // CLOSE GRAPH SETTINGS
        $users = DB::table('usermonthlybid')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_bus');
        $lastMonth = DB::table('usermonthlybid')
            ->whereBetween(
                'created_at',
                [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
            )
            ->sum('total_bus');
        $lms = DB::table('usersfinalmonth')->select('*')
            ->whereBetween(
                'created_at',
                [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
            )
            ->get();
        $usersnot = DB::table('usersfinalmonth')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        // --------------------
        $bid =  Userfinalmonthreport::all();
        $user = User::all();
        $this->validate($request, [
            'fromDate' => 'required',
            'endDate' => 'required'
        ]);
        $fromDate = date('Y-m-d', strtotime($request->input('fromDate')));
        $endDate =  date('Y-m-d', strtotime($request->input('endDate')));
        $query = DB::table('usersfinalmonth')->select()
            ->where('created_at', '>=', $fromDate)
            ->where('created_at', '<=', $endDate)
            ->get();
        //dd($query);
        //return $query;
        return view('admin.dashboard',  compact('users', 'lastMonth', 'userfinal', 'username', 'monthsale', 'labels', 'data', 'lms', 'query', 'usersnot'));
    }
    public function notification()
    {
        // User final report
        $userfinal = Userfinalmonthreport::all();
        $username = DB::table('users')->get();
        //
        $monthsale = Usermonthlybid::all();
        $urBg = Auth::user();
        $userid = $urBg->id;
        $currentMonth = date('m');
        // GRAPH SETTING
        $users = User::join('usersfinalmonth', 'users.id', '=', 'usersfinalmonth.userid')
            ->pluck('usersfinalmonth.total_bus', 'users.name', 'users.budget');

        $labels = $users->keys();
        $data = $users->values();
        // CLOSE GRAPH SETTINGS
        $users = DB::table('usermonthlybid')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_bus');
        $lastMonth = DB::table('usermonthlybid')
            ->whereBetween(
                'created_at',
                [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
            )
            ->sum('total_bus');
        $lms = DB::table('usersfinalmonth')->select('*')
            ->whereBetween(
                'created_at',
                [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
            )
            ->get();
        return view('admin.dashboard', compact('users', 'lastMonth', 'userfinal', 'username', 'monthsale', 'labels', 'data', 'lms'));
    }
    public function updnotification(Request $request)
    {
        $not_status = $request->input('not_status');
        if ($not_status > 0) {
            DB::update('update usersfinalmonth
            set read_status = 1 where read_status = 0');
        }
        return response()->json([
            'status' => 200,
            'not_status' => 0,
        ]);
    }
}
