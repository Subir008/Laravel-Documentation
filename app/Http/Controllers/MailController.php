<?php

namespace App\Http\Controllers;

use App\Mail\AttachmentMail;
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

    function send_mail_attachment(Request $request){

        $filename = time() . "." . $request->file('file')->extension();
        $file_destination = public_path('upload');
        $request->file('file')->move($file_destination , $filename);

        $mail = "deathrocker000@gmail.com";

        $response = Mail::to($mail)->send(new AttachmentMail($request->all() , $filename));

        if($response){
            return back()->with('send_success' , 'Thank For Contacting');
        }else{
            return back()->with('send_fail' , "Mail Couldn't Send");
        }

    }
}
