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

    public function store(){
        $data = request()->validate([
            'inputOrganizationName' => 'required',
            'inputOrganizationLeaderName' => 'required'
        ]);

        $organization = new organization();
        $organization->name = request('inputOrganizationName');
        $organization->leader_name = request('inputOrganizationLeaderName');

        $organization->save();

        return redirect('success');
    }

    public function edit($id)
    {
        return view('organization.edit',[
            'organization' => organization::where('id', $id)->firstOrFail(),
        ]);
    }

    public function update()
    {
        try {
            organization::where('id', request('inputOrganizationId'))->update([
                'name' => request('inputOrganizationName'),
                'leader_name' => request('inputOrganizationLeaderName')
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect('success');
    }

    public function destroy()
    {
        try {
            $organization = organization::where('id', request('inputOrganizationId'));
            $organization->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    
        return redirect('success');
    }
}
