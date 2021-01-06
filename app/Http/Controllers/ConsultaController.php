<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consulta;
use Carbon\Carbon;
use App\empleado;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::whereDate('fecha', today())->paginate(10);
        return view('consultas.index',compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fecha = Carbon::now()->toDateString();
        $empleados = empleado::where('area','Hospital')->get();
        return view('consultas.create', compact('fecha','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        /*$request->validate([
            'propietario' => 'required',
            'mascota' => 'required',
            'peso' => 'required',
            'edad' => 'required',
            'raza' => 'required',
            'servicio' => 'required',
        ]);*/

        $hora = Carbon::now()->timezone('America/Mexico_City')->toTimeString();
        Consulta::create([
            'fecha' => $request->input('fecha'),
            'medico'  => $request->input('medico'),
            'hora_llegada' => $hora,
            'hora_atencion' => $request->input('hora_atencion'),
            'hora_termino' => $request->input('hora_termino'),
            'propietario' => $request->input('propietario'),
            'mascota' => $request->input('mascota'),
            'peso' => $request->input('peso'),
            'edad' => $request->input('edad'),
            'raza' => $request->input('raza'),
            'servicio' => $request->input('servicio'),
        ]);

        return redirect()->route('consultas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::findOrFail($id);
        if($consulta->aprobado == 'nochecked'){
            $hora = Carbon::now()->timezone('America/Mexico_City')->toTimeString();
            $consulta->hora_atencion = $hora;
            $consulta->save();
        }
        return view('consultas.aprove',compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $consulta = $request->except('_token');
        Consulta::where('id','=',$id)->update($consulta);
        $consultas = Consulta::paginate(5);
        return view('consultas.index',compact('consultas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
