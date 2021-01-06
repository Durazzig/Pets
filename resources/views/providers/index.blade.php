@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">Proveedores</h3>
                    </div>
                    <div>
                        <a href="{{ route('providers.create') }}" class="btn btn-primary">
                            {{ __('Nuevo Proveedor')}}
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
                            <th scope="col" style="width: 150px">{{ __('Opciones') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($providers as $provider)
                        <tr>
                            <td>{{ $provider->id }}</td>
                            <td>{{ $provider->name }}</td>
                            <td>{{ $provider->phone }}</td>
                            <td>
                                <a href="{{url('/providers/edit',$provider->id)}}" class="btn btn-outline-secondary btn-sm">
                                    Editar
                                </a>
                                <form action="{{route('providers.delete',$provider->id)}}" method="POST">
									{{method_field('DELETE')}}
									@csrf
									<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
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
