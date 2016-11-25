<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use Redirect;
use Request;
use Session;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function newSong()
    {
      return view('dashboard.new-song');
    }
}
