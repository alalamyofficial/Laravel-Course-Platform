<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;
use App\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{

    public function send_mail(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $mail = new Mail;

        $mail->user_id = Auth::id();
        $mail->name = $request->name;
        $mail->email = $request->email;
        $mail->subject = $request->subject;
        $mail->message = $request->message;

        $mail->save();

        toast('Your Mail has Been Successfully!','success');

        return redirect()->back();

    }

}
