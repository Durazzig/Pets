<?php

namespace App\Http\Controllers;

use App\empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = empleado::all();
        return view('empleados.index', compact('empleados'));
    }
    public function create()
    {
        return view('empleados.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'empleado'  => 'required',
            'telefono' => 'required',
            'area' => 'required',
        ]);
        empleado::create([
            'empleado'  => $request->input('empleado'),
            'telefono' => $request->input('telefono'),
            'area' => $request->input('area'),
        ]);
        $empleados = empleado::all();

        return view('empleados.index', compact('empleados'));
    }
    public function edit($id)
    {
        $empleados = empleado::find($id);
        return view('empleados.edit', compact('empleados'));
    }
    public function update(Request $request, $id)
    {
        $empleado = $request->except('_token');
        empleado::where('id','=',$id)->update($empleado);
        $empleados = empleado::all();
        return view('empleados.index',compact('empleados'));
    }
    public function destroy($id)
    {
        $empleado = empleado::find($id);
        $empleado->delete();
        return redirect()->back()->with('msg','Empleado eliminado correctamente');
    }
}
