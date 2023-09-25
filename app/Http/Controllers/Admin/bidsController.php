<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Userbid;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class bidsController extends Controller
{
    public function index()
    {

        $user = User::all();
        $totaluser = $user->count();
        $currentMonth = date('m');
        $data = DB::table("userbid")
            ->whereRaw('MONTH(created_at) = ?', [$currentMonth])
            ->get();
        $a = array(1 => 0);
        $wordCount = $data->count();
        for ($i = 2; $i <= $totaluser; $i++) {
            $bounced = DB::table("userbid")->whereRaw('MONTH(created_at) = ?', [$currentMonth])->where('userid', $i)->count();
            array_push($a, $bounced);
        }
        $username = DB::table('users')->get();
        $usersnot = DB::table('usersfinalmonth')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        //dd($data);
        return view('admin.bids.index',  compact('user', 'data', 'wordCount', 'a', 'username', 'usersnot'));
    }
    public function showbid($showbid_id)
    {
        $id = $showbid_id;
        $bid =  Userbid::all();
        $user = User::all();
        $username = DB::table('users')->get();
        $usersnot = DB::table('usersfinalmonth')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return view('admin.bids.showbids',  compact('user', 'bid', 'id', 'username', 'usersnot'));
    }
    public function search(Request $request, $showbid_id)
    {
        $id = $showbid_id;
        $bid =  Userbid::all();
        $user = User::all();
        $radiobid = $request->input('radiobid');
        $fromDate = date('Y-m-d', strtotime($request->input('fromDate')));
        $endDate =  date('Y-m-d', strtotime($request->input('endDate')));
        if ($id == 0) {
            if ($fromDate == "" || $endDate == "") {
                $query = DB::table('userbid')->select()
                    ->where('reply', '=', $radiobid)
                    ->get();
            } else {
                $query = DB::table('userbid')->select()
                    ->where('reply', '=', $radiobid)
                    ->where('date', '>=', $fromDate)
                    ->where('date', '<=', $endDate)
                    ->get();
            }
        } else {
            if ($fromDate == "" || $endDate == "") {
                $query = DB::table('userbid')->select()
                    ->where('reply', '=', $radiobid)
                    ->get();
            } else {
                $query = DB::table('userbid')->select()
                    ->where('reply', '=', $radiobid)
                    ->where('date', '>=', $fromDate)
                    ->where('date', '<=', $endDate)
                    ->where('userid', '=', $showbid_id)
                    ->get();
            }
        }
        // dd($query);
        // return $query;
        $username = DB::table('users')->get();
        $usersnot = DB::table('usersfinalmonth')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return view('admin.bids.showbids',  compact('user', 'bid', 'id', 'query', 'username', 'usersnot', 'radiobid', 'fromDate', 'endDate'));
    }
}
