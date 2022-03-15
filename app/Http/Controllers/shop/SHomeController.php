<?php

namespace App\Http\Controllers\shop;

use App\Models\User;
use App\Models\Ukrainian;
use Illuminate\Http\Request;
use App\Imports\VisitsImport;
use App\Models\Ukrainian_visit;
use App\Imports\UkrainianImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class SHomeController extends Controller
{
    public function dashboard()
    {
        $users = User::count();
        $ukrainians = Ukrainian::count();
        $signed = Ukrainian::whereDate('created_at', date('Y-m-d'))->count();
        return view('shop.dashboard', ['users' => $users, 'ukrainians' => $ukrainians, 'signed' => $signed]);
    }

    public function settings()
    {
        return view('shop.settings');
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
        return view('shop.profile');
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

    public function excel()
    {
        return view('excel');
    }

    public function exceldo(Request $request)
    {
        Excel::import(new UkrainianImport, $request->file);
        for($i = 1; $i <= 738; $i++)
        {
            Ukrainian_visit::create([
                'ukrainian_id' => $i,
                'user_id' => Auth::id(),
                'food' => 1,
                'clothes' => 1,
                'detergents' => 1,
                'created_at' => '2022-03-10',
            ]);
        }
        return "success";
    }

    public function visits()
    {
        return view('import');
    }

    public function visitsdo(Request $request)
    {
        Excel::import(new VisitsImport, $request->file);
        return "success";
    }

    public function test()
    {
        $ukrainians = Ukrainian::all();

        foreach ($ukrainians as $uk)
        {
            Ukrainian_visit::create([
                'ukrainian_id' => $uk->id,
                'user_id' => Auth::id(),
                'food' => 1,
                'clothes' => 1,
                'detergents' => 1,
                'created_at' => $uk->created_at,
            ]);
        }

        return "done";
    }
}
