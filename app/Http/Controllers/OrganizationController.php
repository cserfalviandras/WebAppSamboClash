<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\organization;

class OrganizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $organizations = organization::all();
        $organizations = $organizations->sortBy('name');

        return view('organization.index', [
            'organizations' => $organizations
        ]);
    }
}
