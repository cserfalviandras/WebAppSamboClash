<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $finded_user = User::findOrFail($user);
        return view('profiles.index',[
            'user' => $finded_user,
        ]);
    }
}
