<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class MailController extends Controller
{
    function send(){
    	Mail::send(['text'=>'mail'],['name'=>'Mizanur'], function($message){
    		$message->to('mizanurrahman317@gmail.com', 'To Mizanur')->subject('This is test');
    		$message->from('mizanurrahman317@gmail.com','Mizanur');
		});
		
		return redirect()->back();
    }
}
