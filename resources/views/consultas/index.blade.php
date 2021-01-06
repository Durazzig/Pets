@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <div>
                            <h3 class="mb-0">Consultas</h3>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <a href="{{ route('consultas.create') }}" class="btn btn-primary">
                                {{ __('Nueva Consulta')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                    <div class="row">
                        <form action="{{ route('bills.filterDate') }}" method="POST" class="row">
                            @csrf
                            <div class="col-md-4">
                                <input type="date" name="desde" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="hasta" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <select class="custom-select" name="" id="">
                                    <option value="todos">Todos</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-success btn-md btn-block">{{ __('Buscar') }}</button>
                            </div>
                        </form>
                    </div>
            </div>
            <div class="card-body">
                @if(Auth::user())
                <table class="table table-hover table-responsive-lg fixed-table-body">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Fecha') }}</th>
                            <th scope="col">{{ __('Medico') }}</th>
                            <th scope="col">{{ __('Hora Llegada') }}</th>
                            <th scope="col">{{ __('Hora Atencion') }}</th>
                            <th scope="col">{{ __('Hora Termino') }}</th>
                            <th scope="col">{{ __('Propietario') }}</th>
                            <th scope="col">{{ __('Mascota') }}</th>
                            <th scope="col">{{ __('Peso(Kg)') }}</th>
                            <th scope="col">{{ __('Edad') }}</th>
                            <th scope="col">{{ __('Raza') }}</th>
                            <th scope="col">{{ __('Descripcion Servicios') }}</th>
                            <th scope="col" style="width: 150px">{{ __('Opciones') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultas as $consulta)
                        <tr>
                            <td>{{ $consulta->id }}</td>
                            <td>{{ $consulta->fecha}}</td>
                            <td>{{ $consulta->medico }}</td>
                            <td>{{ $consulta->hora_llegada }}</td>
                            <td>{{ $consulta->hora_atencion }}</td>
                            <td>{{ $consulta->hora_termino }}</td>
                            <td>{{ $consulta->propietario }}</td>
                            <td>{{ $consulta->mascota }}</td>
                            <td>{{ $consulta->peso }}</td>
                            <td>{{ $consulta->edad }}</td>
                            <td>{{ $consulta->raza }}</td>
                            <td>{{ $consulta->servicio }}</td>
                            <td>
                                <a href="{{url('/consultas/edit',$consulta->id)}}" class="btn btn-outline-secondary btn-sm">
                                    Ver
                                </a>
                                <button class="btn btn-outline-danger btn-sm btn-delete" data-id="{{ $consulta->id }}">Borrar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$consultas->links()}}
                @else
                    <strong>Se ha detetectado que no te has logueado -> Por favor inicia sesion</strong>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection