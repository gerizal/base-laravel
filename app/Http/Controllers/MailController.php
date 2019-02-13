<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
	public function send()
	{
		// Mail::send(['text'=>'mail'],['name'=>'Yusuf'], function($message){
		// 	$message->to('yusuf.handian@gmail.com','To Yusuf')->subject('Test ya');
		// 	$message->from('yusuf.h@smooets.com');
		// });

		Mail::send(new SendMail());

	}    

	public function email()
	{
		return view('mails.email');
	}
}
