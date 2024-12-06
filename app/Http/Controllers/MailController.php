<?php

namespace App\Http\Controllers;

use App\Mail\FirstMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    function send_mail(Request $request){
        
        $to = $request->to;
        $subject = $request->subject ;
        $comment = $request->comment;

        Mail::to($to)->send(new FirstMail($subject , $comment));

        $request->session()->flash('success','Mail Sent Successfully');
        return redirect('mail') ;
    }
}
