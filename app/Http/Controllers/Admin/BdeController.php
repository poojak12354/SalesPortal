<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bde;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\BdeFormRequest;

class BdeController extends Controller
{
    public function index()
    {
        $bde = Bde::all();
        $username = DB::table('users')->get();
        $usersnot = DB::table('usersfinalmonth')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return view('admin.bde.index', compact('bde', 'usersnot', 'username'));
    }
    public function updatestatus(Request $request, $id)
    {
        $login_status = $request->input('login_status');
        if ($login_status == 1) {
            DB::update('update users set login_status = 0 where id = ?', [$id]);
        } else {
            DB::update('update users set login_status = 1 where id = ?', [$id]);
        }
        return response()->json([
            'status' => 200,
            'login_status' => $login_status == 1 ? 0 : 1,
        ]);
    }
    public function create()
    {
        $username = DB::table('users')->get();
        $usersnot = DB::table('usersfinalmonth')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return view('admin.bde.create', compact('usersnot', 'username'));
    }
    public function store(BdeFormRequest $request)
    {
        $data = $request->validated();
        $bde = new Bde;
        $bde->name = $data['name'];
        $bde->email = $data['email'];
        $bde->budget = $data['target'];
        $bde->password = Hash::make($data['pwd']);
        $bde->save();

        return redirect('admin/bde')->with('message', 'Bde profile created successfully');
    }
    public function edit($bde_id)
    {
        $bde = Bde::find($bde_id);
        $username = DB::table('users')->get();
        $usersnot = DB::table('usersfinalmonth')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return view('admin.bde.edit', compact('bde', 'username', 'usersnot'));
    }

    public function update(Request $request, $bde_id)
    {

        // $bde->password = Hash::make($data['pwd']);
        $name = $request->input('name');
        $email = $request->input('email');
        $budget = $request->input('target');
        DB::update('update users set name = ?, email = ?, budget = ? where id = ?', [$name, $email, $budget, $bde_id]);

        return redirect('admin/bde')->with('message', 'Upwork profile updated successfully');
    }
    public function destroy(Request $request)
    {
        $stud_id = $request->input('delete_stud_id');
        $bde = Bde::find($stud_id);
        if ($bde) {
            $bde->delete();
            return redirect('admin/bde')->with('message', 'Bde profile Deleted successfully');
        } else {
            return redirect('admin/bde')->with('message', 'No Bde profile Deleted');
        }
    }
}
