<?php

namespace App\Http\Controllers\admin;

use App\Models\Ukrainian;
use Illuminate\Http\Request;
use App\Models\Ukrainian_visit;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AHomeController extends Controller
{
    public function dashboard()
    {
        $users = User::count();
        $ukrainians = Ukrainian::count();
        $signed = Ukrainian::whereDate('created_at', date('Y-m-d'))->count();
        return view('admin.dashboard', ['users' => $users, 'ukrainians' => $ukrainians, 'signed' => $signed]);
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function save_settings(Request $request)
    {
        if (!(Hash::check($request->oldpassword, Auth::user()->password))) {
            return back()->withErrors(['oldpassword' => 'Twoje obecne hasło nie pasuje do tego hasła.']);
        }

        if(strcmp($request->oldpassword, $request->password) == 0){
            return back()->withErrors(['password' => 'Nowe hasło nie może być takie samo jak obecne hasło.']);
        }

        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return back()->with(['change_password' => true]);
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function save_profile(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:users,name,'.Auth::id(),
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.Auth::id(),
            'telephone' => 'required|string|max:255',
        ]);

        $user = User::where('id', Auth::id())->first();
        $user->update([
            'name' => $validate['name'],
            'firstname' => $validate['firstname'],
            'lastname' => $validate['lastname'],
            'email' => $validate['email'],
            'telephone' => $validate['telephone'],
        ]);

        return back()->with(['edit_user' => true]);
    }
}
