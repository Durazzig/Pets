@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">Permisos</h3>
                    </div>
                    <div>
                        <a href="{{ route('permisos.create') }}" class="btn btn-primary">
                            {{ __('Nuevo Permiso')}}
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
                            <th scope="col">{{ __('Empleado') }}</th>
                            <th scope="col">{{ __('Area') }}</th>
                            <th scope="col">{{ __('Fecha de permiso') }}</th>
                            <th scope="col">{{ __('Turno') }}</th>
                            <th scope="col">{{ __('Cubre') }}</th>
                            <th scope="col">{{ __('Tipo de permiso') }}</th>
                            <th scope="col">{{ __('Aprobado') }}</th>
                            <th scope="col" style="width: 150px">{{ __('Opciones') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permisos as $permiso)
                        <tr>
                            <td>{{ $permiso->id }}</td>
                            <td>{{ $permiso->empleado }}</td>
                            <td>{{ $permiso->area }}</td>
                            <td>{{ $permiso->fecha_permiso }}</td>
                            <td>{{ $permiso->turno }}</td>
                            <td>{{ $permiso->sustituto }}</td>
                            <td>{{ $permiso->tipo_permiso }}</td>
                            <td><input type="checkbox" name="checkbox" disabled {{ $permiso->aprobado }} ></td>
                            <td>
                                <a href="{{url('/permisos/edit',$permiso->id)}}" class="btn btn-outline-secondary btn-sm">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a href="{{url('/createWord',$permiso->id)}}" class="btn btn-outline-secondary btn-sm">
                                    Imprimir
                                </a>
                            </td>
                            <td action="{{route('permisos.delete',$permiso->id)}}" method="POST">
									{{method_field('DELETE')}}
									@csrf
									<button type="submit" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-outline-danger btn-sm">Borrar</button>
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
