<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Gadget;
use App\Thread;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thread_count = Thread::all()->count();
        $brand_count = Brand::all()->count();
        $gadget_count = Gadget::all()->count();
        return view('admin.admin_home', compact('thread_count', 'brand_count', 'gadget_count'));
    }

    /**
     * Display super admin home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function super_index()
    {
        $created_admin = User::where('role', 'admin')->count();
        $created_today = User::where([
            ['role', 'admin'],
        ])->whereDate('created_at', Carbon::today())->count();
        return view('super_admin.super_admin_home', compact('created_admin', 'created_today'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_manage()
    {
        $data = User::where('role', 'admin')->orderBy('created_at', 'desc')->get();
        return view('super_admin.admins.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super_admin.admins.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100|unique:users',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('admins.index')->with('alert', 'Data saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('super_admin.admins.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!empty($request['password']) && !empty($request['confirm_password'])) {
            $this->validate($request, [
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password'
            ]);
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
            $user->update();
        } else {
            $user = User::find($id);
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->update();
        }

        return redirect()->route('admins.index')->with('alert', 'Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();

        return redirect()->route('admins.index')->with('alert', 'Data deleted!');
    }
}
