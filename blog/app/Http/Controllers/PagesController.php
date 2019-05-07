<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;

use App\Post;

use Illuminate\Http\Request;
use Mail;
use Session;


class PagesController extends Controller{

	public function getIndex(){
		$posts = Post::orderBy('created_at','desc')->limit(4)->get();

		return view('pages.welcome')->withPosts($posts);
		
	}

	public function getAbout(){

		$first = "Gaurav";
		$last = "Pawar";
		$full = $first." ".$last;
		$email = "pawargaurav49@gmail.com";
		//return view('pages.about')->with("fullname", $full);
		return view('pages.about')->withFullname($full)->withEmail($email);
	}

	public function getContact(){
		return view('pages.contact');
	}

	public function postContact(Request $request){
		//validation
		$this->validate($request, [
			'email' => 'required',
			'subject' => 'min:3',
			'message' => 'min:10'
		]);
/*
		$data =array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
		);*/

/*		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('hello@gauav.com');
			$message->subject($data['subject']);
		});*/

		Mail::to('hello@gaurav.com')->send(new ContactForm($request));


		Session::flash('success', 'Your email was Sent!');
		//return redirect()->back();
		return redirect('/');

	}

}