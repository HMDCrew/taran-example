<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke()
    {
        return view('frontend.contacts');
    }

    public function send_mail(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
        ]);

        $details = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'description' => $request->input('description')
        ];

        Email::create($details);
        Mail::to($request->input('email'))->send(new ContactMail($details));

        return redirect()->route('contact')->with('success','Email sended');
    }
}
