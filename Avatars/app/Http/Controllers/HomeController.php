<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\avatar;
use App\User;


class HomeController extends Controller
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
        return view('home');
    }

    public function afficherUsers(){
        $users = User::all();
        return view('home')
            ->with('users', $users);
    }

}
