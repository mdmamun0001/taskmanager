<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Auth;

class SendMailController extends Controller
{
    //

    public function index()
    {
    	$user = Auth::user()->toArray();
    	
    	Mail::send('mail', $user, function($message) use ($user) {
	        $message->to($user['email']);
	        $message->subject('Welcome Mail');
    	});

    	 return redirect()->route('tasks.index');
    }

}
