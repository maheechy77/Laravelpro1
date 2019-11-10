<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function loginplease(){
    	echo'Welcome To Controller,User';
    }

    public function contactUs(){
    	return view('contact');
    }
}
