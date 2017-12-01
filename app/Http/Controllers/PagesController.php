<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Singer;
use App\Style;
use App\User;

class PagesController extends Controller
{
	function trangchu(){
		return view('pages.trangchu');
	}

	function album(){
		return view('pages.album');
	}

	function singer(){
		return view('pages.singer');
	}

	function contact(){
		return view('pages.contact');
	}

	function style(){
		return view('pages.style');
	}

	function song(){
		return view('pages.song');
	}

    
}
