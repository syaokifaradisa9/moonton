<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Models\UserSubscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SubscriptionPlanController extends Controller
{
    public function index(){
        $subscriptionPlans = SubscriptionPlan::all();
        return inertia('User/Dashboard/SubscriptionPlan/Index',[
            'subscriptionPlans' => $subscriptionPlans
        ]);
    }

    public function userSubscribe(Request $request, SubscriptionPlan $subscriptionPlan){
        UserSubscription::create([
            'user_id' => Auth::id(),
            'subscription_plan_id' => $subscriptionPlan->id,
            'price' => $subscriptionPlan->price,
            'expired_date' => Carbon::now()->addMonths($subscriptionPlan->active_period_in_month),
            'payment_status' => 'success',
        ]);


        return Inertia::location(route('user.dashboard.index'));
    }
}
