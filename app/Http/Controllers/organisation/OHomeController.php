<?php

namespace App\Http\Controllers\organisation;

use App\Models\Ukrainian;
use Illuminate\Http\Request;
use App\Models\Ukrainian_visit;
use App\Http\Controllers\Controller;

class OHomeController extends Controller
{
    public function dashboard()
    {
        $visits = Ukrainian_visit::count();
        $ukrainians = Ukrainian::count();
        $signed = Ukrainian::whereDate('created_at', date('Y-m-d'))->count();
        $visits_today = Ukrainian_visit::whereDate('created_at', date('Y-m-d'))->count();

        $date = date('Y-m-d 23:59:59');
        $date1 = date("Y-m-d 23:59:59", strtotime("-1 day"));
        $date2 = date("Y-m-d 23:59:59", strtotime("-2 day"));
        $date3 = date("Y-m-d 23:59:59", strtotime("-3 day"));
        $date4 = date("Y-m-d 23:59:59", strtotime("-4 day"));
        $date5 = date("Y-m-d 23:59:59", strtotime("-5 day"));
        $date6 = date("Y-m-d 23:59:59", strtotime("-6 day"));
        $date7 = date("Y-m-d 23:59:59", strtotime("-7 day"));

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
                'old' => Ukrainian_visit::where('created_at', '>=', $date1)->where('created_at', '<=', $date)->get()->count() - $new1,
            ],
            '2' => [
                'date' => $date1,
                'new' => $new2,
                'old' => Ukrainian_visit::where('created_at', '>=', $date2)->where('created_at', '<=', $date1)->get()->count() - $new2,
            ],
            '3' => [
                'date' => $date2,
                'new' => $new3,
                'old' => Ukrainian_visit::where('created_at', '>=', $date3)->where('created_at', '<=', $date2)->get()->count() - $new3,
            ],
            '4' => [
                'date' => $date3,
                'new' => $new4,
                'old' => Ukrainian_visit::where('created_at', '>=', $date4)->where('created_at', '<=', $date3)->get()->count() - $new4,
            ],
            '5' => [
                'date' => $date4,
                'new' => $new5,
                'old' => Ukrainian_visit::where('created_at', '>=', $date5)->where('created_at', '<=', $date4)->get()->count() - $new5,
            ],
            '6' => [
                'date' => $date5,
                'new' => $new6,
                'old' => Ukrainian_visit::where('created_at', '>=', $date6)->where('created_at', '<=', $date5)->get()->count() - $new6,
            ],
            '7' => [
                'date' => $date6,
                'new' => $new7,
                'old' => Ukrainian_visit::where('created_at', '>=', $date7)->where('created_at', '<=', $date6)->get()->count() - $new7,
            ],
        ];

        if ($new1 == 0)
        {
            $srefugees = -100;

        } elseif ($new1 > 0 and $new2 == 0)
        {
            $srefugees = 100;
        } else {
            $srefugees = round((($new1 - $new2)/$new2)*100, 2);
        }

        if (($chart[1]['old']) == 0)
        {
            $svisits = -100;

        } elseif (($chart[1]['old']) > 0 and $chart[2]['old'] == 0)
        {
            $svisits = 100;
        } else {
            $svisits = round((($chart[1]['old'] - $chart[2]['old'])/$chart[2]['old'])*100, 2);
        }

        $stats = [
            'refugees' => $srefugees,
            'visits' => $svisits,
        ];

        $stats2 = [
            'gender' => [
                'f' => Ukrainian::where('gender', 'f')->get()->count(),
                'm' => Ukrainian::where('gender', 'm')->get()->count(),
            ],
            'stay' => [
                'yes' => Ukrainian::where('stay', 'tak')->get()->count(),
                'no' => Ukrainian::where('stay', 'nie')->get()->count(),
                'maybe' => Ukrainian::where('stay', 'może')->get()->count(),
                'tdk' => Ukrainian::where('stay', 'nie wie')->get()->count(),
            ],
        ];

        return view('organisation.dashboard', ['visits' => $visits, 'ukrainians' => $ukrainians, 'signed' => $signed, 'visits_today' => $visits_today, 'chart' => $chart, 'stats' => $stats, 'stats2' => $stats2]);
    }
}

