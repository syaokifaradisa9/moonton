<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSubscription
{
    public function handle(Request $request, Closure $next, $status): Response
    {
        if($status == "true" && !Auth::user()->isActive){
            return to_route('user.dashboard.subscriptionPlan.index');
        }

        if($status == "false" && Auth::user()->isActive){
            return to_route('user.dashboard.index');
        }

        return $next($request);
    }
}
