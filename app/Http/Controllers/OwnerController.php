<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    
    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    
    public function create()
    {
        return view('owners.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Owner::create([
            'name'  => $request->input('name'),
            'address'  => $request->input('address'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('owners.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
