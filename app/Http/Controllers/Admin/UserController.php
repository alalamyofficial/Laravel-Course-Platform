<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function users(User $user){

        $users = User::latest()->get();

        // $this->authorize('show',$user);

        if(auth()->user()->role_as == 10){

            return view('admin.users.show',compact('users'));
        }else{
            abort(404);
        }


    }
}
