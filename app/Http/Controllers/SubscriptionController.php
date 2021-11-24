<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plans;

class SubscriptionController extends Controller
{
    public function index() {
        $plans = Plans::get();
        return view('platform.subscriptions.plans', compact('plans'));
    }
}
