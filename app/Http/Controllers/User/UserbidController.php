<?php

namespace App\Http\Controllers\User;

use App\Models\Upwork;
use App\Models\Userbid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserbidFormRequest;

class UserbidController extends Controller
{
    public function index()
    {
        $bid =  Userbid::all();
        $id = Auth::user();
        $uid = $id->id;
        return view('user.bid.index', compact('bid', 'uid'));
    }
    public function create()
    {
        $upwork = Upwork::all();
        return view('user.bid.create', compact('upwork'));
    }
    public function store(UserbidFormRequest $request)
    {
        $data = $request->validated();
        $userbid = new Userbid;
        $id = Auth::user();
        $userbid->userid = $id->id;
        $userbid->job_link = $data['job_link'];
        $userbid->client_name = $data['name'];
        $userbid->up_id = $data['up_id'];
        $userbid->reply = $data['optionsReply'];
        $userbid->budget = $data['budget'];
        $userbid->date = $data['up_date'];
        $userbid->save();

        return redirect('user/bid')->with('message', 'Bid profile created successfully');
    }
    public function edit($bid_id)
    {
        $bid = Userbid::find($bid_id);
        $upwork = Upwork::all();
        return view('user.bid.edit', compact('bid', 'upwork'));
    }
    public function update(UserbidFormRequest $request, $bid_id)
    {
        $data = $request->validated();
        $userbid = Userbid::find($bid_id);
        $userbid->job_link = $data['job_link'];
        $userbid->client_name = $data['name'];
        $userbid->up_id = $data['up_id'];
        $userbid->reply = $data['optionsReply'];
        $userbid->budget = $data['budget'];
        $userbid->date = $data['up_date'];
        $userbid->update();

        return redirect('user/bid')->with('message', 'Bid profile updated successfully');
    }
    public function destroy(Request $request)
    {
        $stud_id = $request->input('delete_stud_id');
        $userbid = Userbid::find($stud_id);
        if ($userbid) {
            $userbid->delete();
            return redirect('user/bid')->with('message', 'Bid profile Deleted successfully');
        } else {
            return redirect('user/bid')->with('message', 'No Bid profile Deleted');
        }
    }
}
