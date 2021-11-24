<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Category;

class AdminController extends Controller
{

    public function dashboard(){

        return view('admin.dashboard');

    }


    public function showLoginForm(){

        return view('admin.login');

    }





}