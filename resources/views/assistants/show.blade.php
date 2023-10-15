@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header text-white" id="primary-color">
                        Usuario Encontrado: {{ $assistant->matricula }} | {{ $assistant->nombre }}
                        {{ $assistant->apellido_paterno }} {{ $assistant->apellido_materno }}
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <!-- Matrícula || Clave -->
                            <div class="col-md-3 mb-2">
                                <div class="form-outline">
                                    @if ($assistant->tipo_usuario === 'Externo' || $assistant->tipo_usuario === 'Personal')
                                        <label class="form-label" for="matricula">Clave</label>
                                    @else
                                        <label class="form-label" for="matricula">Matrícula</label>
                                    @endif
                                    <input type="text" class="form-control form-control-lg"
                                        value="{{ $assistant->matricula }}" disabled />
                                </div>
                            </div>
                            <!-- Nombre -->
                            <div class="col-md-3 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Nombre(s)</label>
                                    <input type="text" class="form-control form-control-lg"
                                        value="{{ $assistant->nombre }}" disabled />
                                </div>
                            </div>
                            <!-- Apellido Paterno -->
                            <div class="col-md-3 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Apellido Paterno</label>
                                    <input type="text" class="form-control form-control-lg"
                                        value="{{ $assistant->apellido_paterno }}" disabled />
                                </div>
                            </div>
                            <!-- Apellido Materno -->
                            <div class="col-md-3 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Apellido Materno</label>
                                    <input type="text" class="form-control form-control-lg"
                                        value="{{ $assistant->apellido_materno }}" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if ($assistant->tipo_usuario === 'Externo')
                            @else
                                <!-- Carrera -->
                                <div class="col-md-12 mt-2 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label">Carrera</label>
                                        <input type="text" class="form-control form-control-lg"
                                            value="{{ $assistant->carrera }}" disabled />
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            @if ($assistant->tipo_usuario === 'Externo' || $assistant->tipo_usuario === 'Personal')
                            @else
                                <!-- Grado -->
                                <div class="col-md-3 mt-2 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label">Grado</label>
                                        <input type="text" class="form-control form-control-lg"
                                            value="{{ $assistant->grado }}" disabled />
                                    </div>
                                </div>
                                <!-- Grupo -->
                                <div class="col-md-3 mt-2 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label">Grupo</label>
                                        <input type="text" class="form-control form-control-lg"
                                            value="{{ $assistant->grupo }}" disabled />
                                    </div>
                                </div>
                            @endif
                            <!-- Estado -->
                            <div class="col-md-6 mt-2 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Estado</label>
                                    <input type="text" class="form-control form-control-lg"
                                        value="{{ $assistant->estado }}" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <a href="{{ route('assistants.index') }}" class="btn btn-success mb-2">Regresar Al Panel De
                                Usuarios
                                <img src="https://cdn-icons-png.flaticon.com/512/13/13964.png" alt="Icono de Volver"
                                    class="icon-sca">
                            </a>
                            <a href="{{ route('assistants.edit', $assistant->id) }}" class="btn btn-primary mb-2">Editar
                                Este Usuario
                                <img src="https://cdn-icons-png.flaticon.com/512/709/709652.png" alt="Icono de Edición"
                                    class="icon-sca">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
