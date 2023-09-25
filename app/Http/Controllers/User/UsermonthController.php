<?php

namespace App\Http\Controllers\User;

use App\Models\Upwork;
use App\Models\Userbid;
use Illuminate\Http\Request;
use App\Models\Usermonthlybid;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Userfinalmonthreport;
use Illuminate\Support\Facades\Auth;

class UsermonthController extends Controller
{
    public function index($final_id)
    {
        $idi = $final_id;
        $mnthre = Usermonthlybid::all();
        $urBg = Auth::user();
        $userid = $urBg->id;
        return view('user.monthreport.index', compact('mnthre', 'userid', 'idi'));
    }
    public function create()
    {
        $upwork = Upwork::all();
        $urBg = Auth::user();
        $userid = $urBg->id;
        $budget = $urBg->budget;
        return view('user.monthreport.create', compact('upwork', 'budget'));
    }
    public function sumbitData(Request $request)
    {
        // foreach ($request->name as $key => $insert) {
        //     $data = new Usermonthlybid();
        //     Auth::user();
        //     $data->userid = $request->user()->id;
        //     $data->client_name = $request->name[$key];
        //     $data->up_id = $request->up_id[$key];
        //     $data->total_bus = $request->budget[$key];
        //     $data->bus_target = $request->user()->budget;
        //     $data->save();
        // }
        // $userbid = new Userfinalmonthreport();
        // Auth::user();
        // $my = date('F Y');
        // $userbid->userid = $request->user()->id;
        // $userbid->client_name = $request->user()->name;
        // $userbid->month_name = $request->my;
        // $userbid->total_bus = $request->budget;
        // $userbid->bus_target = $request->user()->budget;
        // $userbid->save();
        Auth::user();
        $my = date('F Y');
        $user_id = $request->user()->id;
        $target = $request->user()->budget;
        $myear = $my;
        $now = new \DateTime();
        $created_at = $now->format('Y-m-d H:i:s');
        $up_id = $request->up_id;
        $client_name = $request->name;
        $total_target = $request->budget;
        $bud = $total_target;
        $sum =  array_sum($bud);


        $employeeaccount_id = Userfinalmonthreport::insertGetId([
            'userid' => $user_id,
            'month_name' => $myear,
            'bus_target' => $target,
            'total_bus' => $sum,
            'created_at' => $created_at,
            'updated_at' => $created_at,

        ]);

        foreach ($request->name as $key => $insert) {
            Usermonthlybid::insert([
                'userid' => $user_id,
                'up_id' => $up_id[$key],
                'user_mnthf_id' => $employeeaccount_id,
                'client_name' => $client_name[$key],
                'total_bus' => $total_target[$key],
                'bus_target' => $target,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
        }
        return redirect('user/finalbid')->with('message', 'Reports  created successfully');
    }

    public function edit($report_id)
    {
        $bid = Usermonthlybid::find($report_id);
        $upwork = Upwork::all();
        $urBg = Auth::user();
        $budget = $urBg->budget;
        return view('user.monthreport.edit', compact('bid', 'upwork', 'budget'));
    }
    public function update(Request $request, $report_id)
    {
        $data = Usermonthlybid::find($report_id);
        $data->client_name = $request->name;
        $data->up_id = $request->up_id;
        $data->total_bus = $request->budget;
        $data->update();
        return redirect('user/month-report')->with('message', 'Month Report updated successfully');
    }
    public function destroy($report_id)
    {
        $userbid = Usermonthlybid::find($report_id);
        if ($userbid) {
            $userbid->delete();
            return redirect('user/month-report')->with('message', 'Month Report Deleted successfully');
        } else {
            return redirect('user/month-report')->with('message', 'No Month  Report Deleted');
        }
    }
    public function showReport()
    {
        $mnthre = Userfinalmonthreport::all();
        $bid =  Userbid::all();
        $id = Auth::user();
        $uid = $id->id;
        $budget = $id->budget;
        return view('user.monthreport.downloadreport', compact('bid', 'uid', 'budget', 'mnthre'));
    }
    // Final report
    public function finalreportindex()
    {
        $mnthre = Userfinalmonthreport::all();
        $urBg = Auth::user();
        $userid = $urBg->id;
        return view('user.monthreport.finalreport', compact('mnthre', 'userid'));
    }
    public function finalreportdestroy(Request $request)
    {
        $stud_id = $request->input('delete_stud_id');
        $userbid = Userfinalmonthreport::find($stud_id);
        if ($userbid) {
            $userbid->delete();
            return redirect('user/finalbid')->with('message', 'Month Report Deleted successfully');
        } else {
            return redirect('user/finalbid')->with('message', 'No Month  Report Deleted');
        }
    }
}
