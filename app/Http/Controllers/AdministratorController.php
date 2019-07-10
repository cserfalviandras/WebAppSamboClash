<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('administrator.index');
    }

    public function success()
    {
        return view('success.index');
    }

    public function unsuccess()
    {
        return view('unsuccess.index');
    }
}
