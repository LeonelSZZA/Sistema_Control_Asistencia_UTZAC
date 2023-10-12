@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header text-white" id="primary-color">
                        <div class="row">
                            <div class="col-md-6 mt-1">
                                ➤ Todos Los Usuarios Inactivos
                            </div>
                            <div class="col-md-6 d-flex flex-row-reverse">
                                <!-- Usuarios Activos -->
                                <a href="{{ route('assistants.index') }}" class="btn btn-success btn-sm mx-1">
                                    Usuarios Activos
                                    <img src="https://cdn-icons-png.flaticon.com/512/681/681494.png" alt="Icono de Usuarios" class="icon-sca">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-hover text-center align-items-center">
                            <thead>
                                <tr class="text-center">
                                    <th>Matrícula</th>
                                    <th>Nombre(s)</th>
                                    <th>A. Paterno</th>
                                    <th>A. Materno</th>
                                    <th width="250px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider text-center">
                                @foreach ($usersInactive as $user)
                                    <tr>
                                        <th scope="row">{{ $user->matricula }}</th>
                                        <td>{{ $user->nombre }}</td>
                                        <td>{{ $user->apellido_paterno }}</td>
                                        <td>{{ $user->apellido_materno }}</td>
                                        <td>
                                            <!-- Editar Usuario -->
                                            <a class="btn btn-primary btn-sm mx-1"
                                                href="{{ route('assistants.edit', $user->id) }}">
                                                Editar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-3">
                        {{ $usersInactive->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
