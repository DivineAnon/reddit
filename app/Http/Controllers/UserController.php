<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register_account(Request $request)
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
            'role' => 'user',
            'password' => bcrypt($request->password)
        ]);

        Auth::loginUsingId($user->id);

        return redirect()->to($request['returnTo'])->with('toast_success', 'Welcome, ' . $request->name);
    }

    public function index() {
        $data = User::where('role', 'user')->latest()->get();
        return view('admin.user.index', compact('data'));
    }

    public function ban(Request $request) {
        $data = User::find($request['id']);
        $data->thread_status = 1;
        $data->update();

        return redirect()->route('users.index')->with('toast_success', 'User banned from thread posting');
    }

    public function unban(Request $request) {
        $data = User::find($request['id']);
        $data->thread_status = 0;
        $data->update();

        return redirect()->route('users.index')->with('toast_success', 'User has been unbanned from thread posting');
    }
}
