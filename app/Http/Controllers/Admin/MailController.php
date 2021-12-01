<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail;

class MailController extends Controller
{
    public function mails(){

        if(auth()->user()->role_as == 10){

            $mails = Mail::latest()->get();
            $mails_count = Mail::all()->count();

        }else{
            abort(404);
        }

        return view('admin.mails.show',compact('mails','mails_count'));
    }

    public function destroy($id){

        $mail = Mail::findOrFail($id);

        $mail->destroy($id);

        return redirect()->back()->with('error','Mail Deleted Successfully');

    }
}
