<?php

namespace App\Http\Controllers\shop;

use Carbon\Carbon;
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
use App\Imports\NewVisitUkrainianImport;

class SHomeController extends Controller
{
    public function dashboard()
    {
        $visits = Ukrainian_visit::count();
        $ukrainians = Ukrainian::count();
        $signed = Ukrainian::whereDate('created_at', date('Y-m-d'))->count();

        $date7 = Carbon::now()->subDays(7);
        $date6 = Carbon::now()->subDays(6);
        $date5 = Carbon::now()->subDays(5);
        $date4 = Carbon::now()->subDays(4);
        $date3 = Carbon::now()->subDays(3);
        $date2 = Carbon::now()->subDays(2);
        $date1 = Carbon::now()->subDays(1);
        $date = Carbon::now();

        $new1 = Ukrainian::where('created_at', '>=', $date1)->where('created_at', '<=', $date)->get()->count();
        $new2 = Ukrainian::where('created_at', '>=', $date2)->where('created_at', '<=', $date1)->get()->count();
        $new3 = Ukrainian::where('created_at', '>=', $date3)->where('created_at', '<=', $date2)->get()->count();
        $new4 = Ukrainian::where('created_at', '>=', $date4)->where('created_at', '<=', $date3)->get()->count();
        $new5 = Ukrainian::where('created_at', '>=', $date5)->where('created_at', '<=', $date4)->get()->count();
        $new6 = Ukrainian::where('created_at', '>=', $date6)->where('created_at', '<=', $date5)->get()->count();
        $new7 = Ukrainian::where('created_at', '>=', $date7)->where('created_at', '<=', $date6)->get()->count();

        $chart = [
            '1' => [
                'date' => $date,
                'new' => $new1,
                'old' => $new1 - Ukrainian_visit::where('created_at', '>=', $date1)->where('created_at', '<=', $date)->get()->count(),
            ],
            '2' => [
                'date' => $date1,
                'new' => $new2,
                'old' => $new2 - Ukrainian_visit::where('created_at', '>=', $date2)->where('created_at', '<=', $date1)->get()->count(),
            ],
            '3' => [
                'date' => $date2,
                'new' => $new3,
                'old' => $new3 - Ukrainian_visit::where('created_at', '>=', $date3)->where('created_at', '<=', $date2)->get()->count(),
            ],
            '4' => [
                'date' => $date3,
                'new' => $new4,
                'old' => $new4 - Ukrainian_visit::where('created_at', '>=', $date4)->where('created_at', '<=', $date3)->get()->count(),
            ],
            '5' => [
                'date' => $date4,
                'new' => $new5,
                'old' => $new5 - Ukrainian_visit::where('created_at', '>=', $date5)->where('created_at', '<=', $date4)->get()->count(),
            ],
            '6' => [
                'date' => $date5,
                'new' => $new6,
                'old' => $new6 - Ukrainian_visit::where('created_at', '>=', $date6)->where('created_at', '<=', $date5)->get()->count(),
            ],
            '7' => [
                'date' => $date6,
                'new' => $new7,
                'old' => $new7 - Ukrainian_visit::where('created_at', '>=', $date7)->where('created_at', '<=', $date6)->get()->count(),
            ],
        ];

        return view('shop.dashboard', ['visits' => $visits, 'ukrainians' => $ukrainians, 'signed' => $signed, 'chart' => $chart]);
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
        Excel::import(new NewVisitUkrainianImport, $request->file);

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
}
