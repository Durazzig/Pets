@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">Mascotas de {{$owner->name}}</h3>
                    </div>
                    <div>
                    <a href="{{route('owners.addPet',$owner->id)}}" class="btn btn-success"><span>Añadir Mascota</span></a>
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
                            <th scope="col">{{ __('Especie') }}</th>
                            <th scope="col">{{ __('Raza') }}</th>
							<th scope="col">{{ __('Edad') }}</th>
							<th scope="col">{{ __('Estatus') }}</th>
                            <th scope="col" style="width: 150px">{{ __('Editar') }}</th>
							<th scope="col" style="width: 150px">{{ __('Eliminar') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pets as $pet)
                        <tr>
                            <td>{{ $pet->id }}</td>
                            <td>{{ $pet->name }}</td>
                            <td>{{ $pet->species }}</td>
                            <td>{{ $pet->raze }}</td>
							<td>{{ $pet->age }}</td>
							<td>{{ $pet->status }}</td>
                            <td>
								<a href="{{route('pets.editFromOwner',$pet->id)}}" class="btn btn-outline-secondary btn-sm">
									Editar
                                </a>
                            </td>
							<td>
								<form action="{{route('pets.delete',$pet->id)}}" method="POST">
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
