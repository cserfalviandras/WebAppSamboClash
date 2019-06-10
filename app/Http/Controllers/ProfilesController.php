<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class ProfilesController extends Controller
{
    public function index($user)
    {
        //dd(User::find($user));
        $finded_user = User::find($user);
        return view('home',[
            'user' => $finded_user,
        ]);
    }
}
