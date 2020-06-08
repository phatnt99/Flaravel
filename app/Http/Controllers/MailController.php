<?php

namespace App\Http\Controllers;

use App\Mail\CustomMailNotification;
use App\Mail\NewGiftNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function index() {
        $user = User::all()->random(1)->first();
        Mail::to($user->email)->send(new NewGiftNotification($user));
        // check for failures
        if (Mail::failures()) {
            echo 'Your mail cant send';
        } else
            echo 'Send mail successfully!';

        //return new NewGiftNotification($user);
    }

    public function showFormSendMail() {
        return view('sendmail');
    }

    public function sendMail(Request $request) {
        //save attachment
        $arrData = $request->except('to');
        if($request->hasFile('attachment')) {
            //store to storage
            $path = $request->file('attachment')->store('mailattach');
            $arrData['attachment'] = $path;
        }

        Mail::to($request->to)->send(new CustomMailNotification($arrData));
        if (Mail::failures()) {
            echo 'Your mail cant send';
        } else
            echo 'Send mail successfully!';
        //return new CustomMailNotification($request->except('to'));
    }
}
