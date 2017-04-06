<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avatar;
use App\User;
use Illuminate\Support\Facades\Auth;


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

        $avatars = Avatar::all();

        foreach ($avatars as $avatar){
            if($request->email_form==$avatar->email){
                echo "<script language='javascript'>alert('Attention, ce courriel a déjà un avatar, choissisez un autre');</script>";

                return redirect()->route('insertAvatar');
            }
        }


        $auth = Auth::user()->email;

        $users = User::all();
        foreach ($users as $user){
            if ($user->email==$auth){
                $user_id=$user->id;
            }
        }
        $url = 'avatar_'.time().'.png';
        $request->image->storeAS('images', $url);


        $m = new avatar;
        $m->user_id = $user_id;
        $m->email = $request->email_form;
        $m->name = $url;
        $m->save();
        
        $email = $m->email;


        return view('insertAvatarSubmit')
            ->with('email', $email);
    }

    public function downloadAvatar($email)
    {
        // Find avatar model
        $avatar = Avatar::where('email', '=', $email)->get();

        if(empty($avatar[0]->name)){
            // Get file path from model
            $avatarFilePath = storage_path('app/public/w.png'); // storage/images/e.png
        }else{
            // Get file path from model
            $avatarFilePath = storage_path('app/images/'.$avatar[0]->name); // storage/images/e.png
        }

        return response()->download($avatarFilePath);
    }

    public function listerAvatars()
    {
        $auth = Auth::user()->email;

        $users = User::all();
        foreach ($users as $user){
            if ($user->email==$auth){
                $user_id=$user->id;
            }
        }

        $avatars = Avatar::where('user_id', '=', $user_id)->get();

        return view('listerAvatars')
            ->with('avatars', $avatars);

        // Get file path from model
        $avatarFilePath = storage_path('app/images/'.$avatar[0]->name); // storage/images/e.png

        return response()->download($avatarFilePath);
    }

    public function deleteAvatar($email)
    {

        Avatar::where('email', '=', $email)->delete();

        echo "<script language='javascript'>alert('Your user has been deleted');</script>";


        return redirect()->route('listerAvatars');

    }
}
