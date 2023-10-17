@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header text-white" id="primary-color">
                        Registrar Nuevo Personal
                    </div>

                    <div class="card-body">
                        <form action="{{ route('createPersonal') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Clave -->
                                <div class="col-md-3 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="matricula">Clave</label>
                                        <input type="text" id="matricula"
                                            class="form-control form-control-lg @error('matricula') is-invalid @enderror"
                                            name="matricula" value="{{ $clue }}"
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
                                            <!-- TSU -->
                                            <option value="TSU Tecnologías de la Información">
                                                TSU Tecnologías de la Información
                                            </option>
                                            <option value="TSU Procesos Industriales">
                                                TSU Procesos Industriales
                                            </option>
                                            <option value="TSU Desarrollo de Negocios">
                                                TSU Desarrollo de Negocios
                                            </option>
                                            <option value="TSU Mantenimiento Industrial">
                                                TSU Mantenimiento Industrial
                                            </option>
                                            <option value="TSU Mecatronica">
                                                TSU Mecatronica
                                            </option>
                                            <option value="TSU Energías Renovables">
                                                TSU Energías Renovables
                                            </option>
                                            <option value="TSU Minería ">
                                                TSU Minería
                                            </option>
                                            <option value="TSU Administración Capital Humano">
                                                TSU Administración Capital Humano
                                            </option>
                                            <option value="TSU Terapia Física">
                                                TSU Terapia Física
                                            </option>
                                            <option value="TSU Agricultura Sustentable y Protegida">
                                                TSU Agricultura Sustentable y Protegida
                                            </option>
                                            <!-- Ingeniería -->
                                            <option value="ING Tecnologías de la Información">
                                                ING Tecnologías de la Información
                                            </option>
                                            <option value="ING Procesos y Operaciones  Industriales">
                                                ING Procesos y Operaciones Industriales
                                            </option>
                                            <option value="ING Desarrollo de Negocios e Innovación">
                                                ING Desarrollo de Negocios e Innovación
                                            </option>
                                            <option value="ING Mantenimiento Industrial">
                                                ING Mantenimiento Industrial
                                            </option>
                                            <option value="ING Mecatronica">
                                                ING Mecatronica
                                            </option>
                                            <option value="ING Energías Renovables">
                                                ING Energías Renovables
                                            </option>
                                            <option value="ING Minería">
                                                ING Minería
                                            </option>
                                            <option value="ING Gestión del Capital Humano">
                                                ING Gestión del Capital Humano
                                            </option>
                                            <option value="ING Terapia Física">
                                                ING Terapia Física
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
                            <div class="d-grid gap-2 mt-1">
                                <button type="submit" class="btn btn-success">
                                    Registrar Personal
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
