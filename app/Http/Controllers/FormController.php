<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ], [
            'name.required' => 'Name is required.',
            'subject.required' => 'Subject is required.',
            'message.required' => 'Message is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be email address.'
        ]);

        $to = "arif.mmdv@gmail.com";
        $subject = "Falcon - Entry from website";

        $txt = "<p>Name: $request->name<p>";
        $txt .= "<p>Email: $request->email<p>";
        $txt .= "<p>Subject: $request->subject<p>";
        $txt .= "<p>Phone: $request->tel<p>";
        $txt .= "<p>Message: $request->message<p>";

        $header = "From:website@falconfzc.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail ($to,$subject,$txt,$header);

        if ( $retval == true ) {
            return redirect()->back()->with('success', 'Email sent successfully');
        } else {
            return redirect()->back()->with('error', 'Oups. Try again or call us.');
        }
    }
}
