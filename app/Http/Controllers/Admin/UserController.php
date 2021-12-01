<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function users(User $user){

        $users = User::latest()->get();
        $users_count = User::all()->count();

        if(auth()->user()->role_as == 10){

            return view('admin.users.show',compact('users','users_count'));
        }else{
            abort(404);
        }


    }

    public function edit($id){

        $user = User::findOrFail($id);

        return view('admin.users.edit',compact('user'));

    }

    public function update(Request $request , $id){

        $user = User::findOrFail($id);


        $this->validate($request,[

            'name' => 'required',
            'email' => 'required|email',
            'role_as' => 'required',
            'password' => 'required|confirmed',
            'stripe_id' => 'sometimes',
            'card_brand' => 'sometimes',
            'card_last_four' => 'sometimes',

        ]);

        $update_user = [

            'name' => $request->name,
            'email' => $request->email,
            'role_as' => $request->role_as,
            'password' => bcrypt($request->password),
            'stripe_id' => $request->stripe_id,
            'card_brand' => $request->card_brand,
            'card_last_four' => $request->card_last_four,

        ];

        $user->update($update_user);

        return redirect()->back()->with('info','User Updated Successfully');


    }

    public function destroy($id){

        $user = User::findOrFail($id);

        $user->delete($id);

        return redirect()->back()->with('danger','User Deleted Successfully');
    }

}
