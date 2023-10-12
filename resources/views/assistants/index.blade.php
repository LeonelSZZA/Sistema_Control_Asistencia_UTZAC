@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>¡Éxito!</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <strong>¡Error!</strong> {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        @endforeach
                    </div>
                @endif

                <div class="card shadow-lg">
                    <div class="card-header" id="primary-color">
                        <div class="row">
                            <div class="col-md-6 mt-1 text-white">
                                ➤ Últimos Usuarios Registrados
                            </div>
                            <div class="col-md-6 d-flex flex-row-reverse">
                                <!-- Usuarios Dados De Baja -->
                                <a href="{{ route('viewInactive') }}" class="btn btn-danger btn-sm mx-1">
                                    Usuarios Dados De Baja
                                    <img src="https://cdn-icons-png.flaticon.com/512/6067/6067158.png" alt="Icono de Baja"
                                        class="icon-sca">
                                </a>
                                <!-- Modal: Buscar Usuario -->
                                <button type="button" class="btn btn-primary btn-sm mx-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalBU">
                                    Buscar Usuario
                                    <img src="https://cdn-icons-png.flaticon.com/512/795/795724.png" alt="Icono de Búsqueda"
                                        class="icon-sca">
                                </button>
                                <!-- Modal: Buscar Usuario -->
                                <div class="modal fade" id="exampleModalBU" tabindex="-1"
                                    aria-labelledby="exampleModalBULabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalBULabel">
                                                    Buscar Usuario Por Matrícula
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="p">
                                                    Ingresa la matrícula de un estudiante que esté inscrito en el gimnasio
                                                    para poder acceder a su información y actualizarla.
                                                </p>
                                                <form action="{{ route('searchUser') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <!-- Matrícula -->
                                                        <div class="col-md-12 mb-2">
                                                            <div class="form-outline">
                                                                <label class="form-label text-dark" for="matricula">
                                                                    Matrícula
                                                                </label>
                                                                <input type="number" id="matricula"
                                                                    class="form-control form-control-lg"
                                                                    placeholder="Ej. 482100078" name="matricula" required
                                                                    autofocus />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-grid gap-2 pt-2">
                                                        <button class="btn btn-primary" type="submit">
                                                            Encontrar Usuario
                                                            <img src="https://cdn-icons-png.flaticon.com/512/795/795724.png"
                                                                alt="Icono de Búsqueda" class="icon-sca">
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Registrar Nuevo Usuario -->
                                <a href="{{ route('assistants.create') }}" class="btn btn-success btn-sm mx-1">
                                    Registrar Nuevo Usuario
                                    <img src="https://cdn-icons-png.flaticon.com/512/4202/4202263.png"
                                        alt="Icono de Registro de Usuario" class="icon-sca">
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
                                @foreach ($assistants as $assistant)
                                    <tr>
                                        <th scope="row">{{ $assistant->matricula }}</th>
                                        <td>{{ $assistant->nombre }}</td>
                                        <td>{{ $assistant->apellido_paterno }}</td>
                                        <td>{{ $assistant->apellido_materno }}</td>
                                        <td>
                                            <!-- Editar Usuario -->
                                            <a class="btn btn-primary btn-sm mx-1"
                                                href="{{ route('assistants.edit', $assistant->id) }}">
                                                Editar
                                                <img src="https://cdn-icons-png.flaticon.com/512/709/709652.png"
                                                    alt="Icono de Edición" class="icon-sca">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-3">
                        {{ $assistants->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
