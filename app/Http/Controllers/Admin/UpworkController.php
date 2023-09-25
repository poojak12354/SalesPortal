<?php

namespace App\Http\Controllers\Admin;

use App\Models\Upwork;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpworkFormRequest;

class UpworkController extends Controller
{
    // public function index(Request $request, $page = 1)
    // {
    //     $upwork = Upwork::all();
    //     $username = DB::table('users')->get();
    //     $usersnot = DB::table('usersfinalmonth')
    //         ->whereMonth('created_at', Carbon::now()->month)
    //         ->get();
    //     $paginate = 1;
    //     $skip = ($page * $paginate) - $paginate;
    //     $prevURL = $nextURL = '';

    //     if ($skip > 0) {
    //         $prevURL = $page - 1;
    //     }

    //     $users = Upwork::latest()
    //         ->skip($skip)
    //         ->take($paginate)
    //         ->get();

    //     if ($users->count() > 0) {
    //         if ($users->count() >= $paginate) {
    //             $nextURL = $page + 1;
    //         }
    //         return view('admin.upwork.index', compact('users', 'prevURL', 'nextURL', 'upwork', 'username', 'usersnot'));
    //     }

    //     return redirect('/admin/upwork');
    // }
    public function index()
    {
        $upwork = Upwork::all();
        $username = DB::table('users')->get();
        $usersnot = DB::table('usersfinalmonth')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return view('admin.upwork.index', compact('upwork', 'username', 'usersnot'));
    }
    public function create()
    {
        $username = DB::table('users')->get();
        $usersnot = DB::table('usersfinalmonth')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return view('admin.upwork.create', compact('username', 'usersnot'));
    }
    public function store(UpworkFormRequest $request)
    {
        $data = $request->validated();
        $upwork = new Upwork;
        $upwork->name = $data['up_name'];
        $upwork->profile_link = $data['up_link'];
        $upwork->save();

        return redirect('admin/upwork')->with('message', 'Upwork profile created successfully');
    }
    public function edit($category_id)
    {
        $upwork = Upwork::find($category_id);
        $username = DB::table('users')->get();
        $usersnot = DB::table('usersfinalmonth')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return view('admin.upwork.edit', compact('upwork', 'username', 'usersnot'));
    }
    public function update(UpworkFormRequest $request, $category_id)
    {
        $data = $request->validated();

        $upwork = Upwork::find($category_id);
        $upwork->name = $data['up_name'];
        $upwork->profile_link = $data['up_link'];
        $upwork->update();

        return redirect('admin/upwork')->with('message', 'Upwork profile updated successfully');
    }
    public function destroy(Request $request)
    {
        $stud_id = $request->input('delete_stud_id');
        $upwork = Upwork::find($stud_id);
        if ($upwork) {
            $upwork->delete();
            return redirect('admin/upwork')->with('message', 'Upwork profile Deleted successfully');
        } else {
            return redirect('admin/upwork')->with('message', 'No Upwork profile Deleted');
        }
    }
}
