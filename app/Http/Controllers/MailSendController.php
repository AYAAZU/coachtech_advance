<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Mail\FromShopNotification;
use Illuminate\Support\Facades\Mail;

class MailSendController extends Controller
{
    public function send(Request $request){
        $user = User::find($request->user_id);
        $name = $user->name;
        $title = $request->title;
        $text = $request->text;
        $to = $user->email;
        Mail::to($to)->send(new FromShopNotification($title, $text));
        return view('emails.sent');
    }
}
