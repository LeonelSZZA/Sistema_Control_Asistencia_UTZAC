@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header text-white" id="primary-color">
                        Registrar Nuevo Usuario
                    </div>

                    <div class="card-body">
                        <form action="{{ route('assistants.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Matrícula -->
                                <div class="col-md-3 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="matricula">Matrícula</label>
                                        <input type="number" id="matricula"
                                            class="form-control form-control-lg @error('matricula') is-invalid @enderror"
                                            placeholder="Ej. 482100078" name="matricula" value="{{ old('matricula') }}"
                                            required autofocus />
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
                                            placeholder="Nombre" name="nombre" value="{{ old('nombre') }}" required />
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
                                            value="{{ old('apellido_paterno') }}" required />
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
                                            value="{{ old('apellido_materno') }}" required />
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
                                            <img src="https://cdn-icons-png.flaticon.com/512/3856/3856566.png"
                                                alt="Icono de Carrera" class="icon-sca-dark">
                                        </label>
                                        <select class="form-select form-select-lg @error('carrera') is-invalid @enderror"
                                            id="carrera" name="carrera">
                                            <option disabled selected>Escoge Una...</option>
                                            <option
                                                value="Tecnologías de la Información - Desarrollo de Software Multiplataforma">
                                                Tecnologías de la Información - Desarrollo de Software Multiplataforma
                                            </option>
                                            <option value="Tecnologías de la Información - Redes">
                                                Tecnologías de la Información - Redes
                                            </option>
                                            <option value="Tecnologías de la Información - Multimedia">
                                                Tecnologías de la Información - Multimedia
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
                                    <label class="form-label" for="grado">Cuatrimestre</label>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="grado">
                                            <img src="https://cdn-icons-png.flaticon.com/512/2984/2984024.png"
                                                alt="Icono de Grado" class="icon-sca-dark">
                                        </label>
                                        <select class="form-select form-select-lg @error('grado') is-invalid @enderror"
                                            id="grado" name="grado">
                                            <option disabled selected>Escoge Una...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                        @error('grado')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Grupo -->
                                <div class="col-md-3 mb-2">
                                    <label class="form-label" for="grupo">Grupo</label>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="grupo">
                                            <img src="https://cdn-icons-png.flaticon.com/512/681/681494.png"
                                                alt="Icono de Grupo" class="icon-sca-dark">
                                        </label>
                                        <select class="form-select form-select-lg @error('grupo') is-invalid @enderror"
                                            id="grupo" name="grupo">
                                            <option disabled selected>Escoge Una...</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                            <option value="G">G</option>
                                            <option value="H">H</option>
                                            <option value="I">I</option>
                                            <option value="J">J</option>
                                        </select>
                                        @error('grupo')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-1">
                                <button type="submit" class="btn btn-success">
                                    Registrar Usuario
                                    <img src="https://cdn-icons-png.flaticon.com/512/4202/4202263.png"
                                        alt="Icono de Registro de Usuario" class="icon-sca">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
