@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Editar Usuario: {{ $assistant->matricula }} | {{ $assistant->nombre }}
                        {{ $assistant->apellido_paterno }} {{ $assistant->apellido_materno }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('assistants.update', $assistant->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Matrícula -->
                                <div class="col-md-3 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="matricula">Matrícula</label>
                                        <input type="number" id="matricula"
                                            class="form-control form-control-lg @error('matricula') is-invalid @enderror"
                                            placeholder="Ej. 482100078" name="matricula" value="{{ $assistant->matricula }}"
                                            disabled />
                                        @error('matricula')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Nombre -->
                                <div class="col-md-3 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="nombre">Nombre(s)</label>
                                        <input type="text" id="nombre"
                                            class="form-control form-control-lg @error('nombre') is-invalid @enderror"
                                            placeholder="Nombre" name="nombre" value="{{ $assistant->nombre }}" required
                                            autofocus />
                                        @error('nombre')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Apellido Paterno -->
                                <div class="col-md-3 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="apellido_paterno">Apellido Paterno</label>
                                        <input type="text" id="apellido_paterno"
                                            class="form-control form-control-lg @error('apellido_paterno') is-invalid @enderror"
                                            placeholder="Apellido Paterno" name="apellido_paterno"
                                            value="{{ $assistant->apellido_paterno }}" required />
                                        @error('apellido_paterno')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Apellido Materno -->
                                <div class="col-md-3 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="apellido_materno">Apellido Materno</label>
                                        <input type="text" id="apellido_materno"
                                            class="form-control form-control-lg @error('apellido_materno') is-invalid @enderror"
                                            placeholder="Apellido Materno" name="apellido_materno"
                                            value="{{ $assistant->apellido_materno }}" required />
                                        @error('apellido_materno')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Carrera -->
                                <div class="col-md-12 mt-2">
                                    <label class="form-label" for="carrera">Carrera</label>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="carrera">
                                            <!-- Icono -->
                                        </label>
                                        <select class="form-select form-select-lg" id="carrera" name="carrera">
                                            <option selected>{{ $assistant->carrera }}</option>
                                            <option
                                                value="Tecnologías de la Información - Desarrollo de Software Multiplataforma">
                                                Tecnologías de la Información - Desarrollo de Software Multiplataforma
                                            </option>
                                        </select>
                                        @error('carrera')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Grado -->
                                <div class="col-md-3 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="grado">Grado</label>
                                        <input type="number" id="grado"
                                            class="form-control form-control-lg @error('grado') is-invalid @enderror"
                                            placeholder="Grado" name="grado" value="{{ $assistant->grado }}" required />
                                        @error('grado')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Grupo -->
                                <div class="col-md-3 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="grupo">Grupo</label>
                                        <input type="text" id="grupo"
                                            class="form-control form-control-lg @error('grupo') is-invalid @enderror"
                                            placeholder="Grupo" name="grupo" value="{{ $assistant->grupo }}" required />
                                        @error('grupo')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Estado -->
                                <div class="col-md-6">
                                    <label class="form-label" for="estado">Estado</label>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="estado">
                                            <!-- Icono -->
                                        </label>
                                        <select class="form-select form-select-lg" id="estado" name="estado">
                                            <option selected>{{ $assistant->estado }}</option>
                                            @if ($assistant->estado === 'Activo')
                                                <option value="Inactivo">Inactivo</option>
                                            @elseif ($assistant->estado === 'Inactivo')
                                                <option value="Activo">Activo</option>
                                            @endif
                                        </select>
                                        @error('estado')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar Usuario
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection