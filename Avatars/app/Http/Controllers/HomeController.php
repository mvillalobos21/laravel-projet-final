<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\avatar;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


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

    public function addAvatarSubmit(Request $request){


        $auth = Auth::user()->email;

        $users = User::all();
        foreach ($users as $user){
            if ($user->email==$auth){
                $user_id=$user->id;
            }
        }
        $url = 'avatar_'.time().'.png';
        $path = $request->image->storeAS('images', $url);


        $m = new avatar;
        $m->user_id = $user_id;
        $m->email = $request->email_form;
        $m->url = $url;
        $m->save();

        return response()->download('storage/app/'.$path);

        return view('insertAvatarSubmit')
            ->with('file', asset($url));
    }

}
