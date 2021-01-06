@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">Empleados</h3>
                    </div>
                    <div>
                        <a href="{{ route('empleados.create') }}" class="btn btn-primary">
                            {{ __('Nuevo Empleado')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            @if(session('msg'))
                <div class="alert alert-warning" align="center">{{session('msg')}}</div>
            @endif
                @if(Auth::user())
                <table class="table table-hover table-responsive-lg fixed-table-body">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Nombre') }}</th>
                            <th scope="col">{{ __('Telefono') }}</th>
                            <th scope="col">{{ __('Area') }}</th>
                            <th scope="col" style="width: 150px">{{ __('Opciones') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $empleado->empleado }}</td>
                            <td>{{ $empleado->telefono }}</td>
                            <td>{{ $empleado->area}}</td>
                            <td>
                                <a href="{{url('/empleados/edit',$empleado->id)}}" class="btn btn-outline-secondary btn-sm">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <form action="{{route('empleados.delete',$empleado->id)}}" method="POST">
									{{method_field('DELETE')}}
									@csrf
									<button type="submit" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-outline-danger btn-sm">Borrar</button>
								</form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <strong>Se ha detetectado que no te has logueado -> Por favor inicia sesion</strong>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection