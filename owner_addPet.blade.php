@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">{{ __('Nueva Mascota') }}</h3>
                    </div>
                    <div>
                        <a href="{{ route('consultas.index') }}" class="btn btn-danger">
                            {{ __('Regresar')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(Auth::user())
                <form action="{{ route('pets.storeFromOwner',$owner->id) }}" method="POST">
                    @csrf
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Especie</label>
                            <input type="text" name="species" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <label>Raza</label>
                            <input name="raze" class="form-control" required></input>
                        </div>
                        <div class="col-md-6">
                            <label>Edad</label>
                            <input type="text" name="age" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-md-12">
                            <label>Estatus</label>
                            <input type="text" name="status" class="form-control" required>
                        </div>
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

