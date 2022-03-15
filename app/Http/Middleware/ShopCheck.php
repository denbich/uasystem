<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopCheck
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'shop')
        {
            return $next($request);
        } else {
            return redirect()->route('redirect');
        }
    }
}
