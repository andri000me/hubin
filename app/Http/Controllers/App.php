<?php namespace App\Http\Controllers;

class App extends Controller {

	public function __construct(){
		// Construct
	}

	public function index(){
		return view('welcome');
	}

}
