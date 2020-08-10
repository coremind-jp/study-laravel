<?php

namespace App\Http\Controllers;

use App\Mail\MarkdownSampleMail;
use App\Mail\SampleMail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function html()
    {
        $user = User::find(Auth::user()->id);

        Mail::to($user->email)->send(new SampleMail($user));

        return view('mail.index', [
            'type' => 'HTML'
        ]);
    }

    public function markdown()
    {
        $user = User::find(Auth::user()->id);

        Mail::to($user->email)->send(new MarkdownSampleMail($user));

        return view('mail.index', [
            'type' => 'Markdown'
        ]);
    }
}
