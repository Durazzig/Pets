@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">{{ __('Nuevo Empleado') }}</h3>
                    </div>
                    <div>
                        <a href="{{ route('empleados.index') }}" class="btn btn-danger">
                            {{ __('Regresar')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(Auth::user())
                <form action="{{ route('empleados.store') }}" method="POST">
                    @csrf
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <label for="name">{{ __('Nombre') }}</label>
                            <input type="text" name="empleado" id="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone">{{ __('Celular') }}</label>
                            <input type="text" name="telefono" id="phone" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                            <label for="name">{{ __('Area') }}</label>
                            <select name="area" class="form-control @error('name') is-invalid @enderror">
                                <option value="Caja">Caja</option>
                                <option value="Recepcion">Recepción</option>
                                <option value="Hospital">Hospital</option>
                                <option value="Laboratorio">Laboratorio</option>
                                <option value="Mantenimiento">Mantenimiento</option>
                                <option value="Estetica">Estética</option>
                                <option value="Gerencia">Gerencia</option>
                                <option value="Quirofano">Quirófano</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">{{ __('Crear') }}</button>
                    </div>
                </form>
                @else
                    <strong>Se ha detetectado que no te has logueado -> Por favor inicia sesion</strong>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

