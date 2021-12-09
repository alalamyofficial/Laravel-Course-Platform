<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plans;
use App\Setting;
use App\Category;

class SubscriptionController extends Controller
{
    public function index() {

        $settings = Setting::latest()->limit(1)->first();
        $categories = Category::latest()->limit(5)->get();

        $plans = Plans::get();
        return view('platform.subscriptions.plans', compact('plans','settings','categories'));
    }
}
