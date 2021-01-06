<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    
    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
    }

    
    public function create()
    {
        return view('pets.create');
    }

    
    public function store(Request $request)
    {
        //dd($request->input('owner'));
        $request->validate([
            'name'  => 'required',
            'species' => 'required',
            'raze' => 'required',
            'age' => 'required',
            'status' => 'required',
            'owner_id' => 'required',
        ]);

        Pet::create([
            'name'  => $request->input('name'),
            'species'  => $request->input('species'),
            'raze' => $request->input('raze'),
            'age' => $request->input('age'),
            'status' => $request->input('status'),
            'owner_id' => $request->input('owner_id'),
        ]);


        $pets = Pet::all();
        return view('pets.index',compact('pets'));
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
