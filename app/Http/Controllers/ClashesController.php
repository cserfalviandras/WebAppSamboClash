<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClashesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('clashes.index');
    }
}
