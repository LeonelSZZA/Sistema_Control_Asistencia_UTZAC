@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header text-white" id="primary-color">
                        Información Sobre Tu Registro De Entrada
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Matrícula -->
                            <div class="col-md-3 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Matrícula</label>
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
                            <!-- Carrera -->
                            <div class="col-md-8 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Carrera</label>
                                    <input type="text" class="form-control form-control-lg"
                                        value="{{ $assistant->carrera }}" disabled />
                                </div>
                            </div>
                            <!-- Grado -->
                            <div class="col-md-2 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Grado</label>
                                    <input type="text" class="form-control form-control-lg"
                                        value="{{ $assistant->grado }}" disabled />
                                </div>
                            </div>
                            <!-- Grupo -->
                            <div class="col-md-2 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Grupo</label>
                                    <input type="text" class="form-control form-control-lg"
                                        value="{{ $assistant->grupo }}" disabled />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-around">
                            <!-- Día -->
                            <div class="col-md-2 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Día</label>
                                    <input type="text" class="form-control form-control-lg" value="{{ $day }}"
                                        disabled />
                                </div>
                            </div>
                            <!-- Mes -->
                            <div class="col-md-2 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Mes</label>
                                    <input type="text" class="form-control form-control-lg" value="{{ $month }}"
                                        disabled />
                                </div>
                            </div>
                            <!-- Año -->
                            <div class="col-md-2 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Año</label>
                                    <input type="text" class="form-control form-control-lg" value="{{ $year }}"
                                        disabled />
                                </div>
                            </div>
                            <!-- Hora De Entrada -->
                            <div class="col-md-2 mb-2">
                                <div class="form-outline">
                                    <label class="form-label">Hora De Entrada</label>
                                    <input type="text" class="form-control form-control-lg"
                                        value="{{ $horaEntrada }}" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <a href="{{ route('viewWelcome') }}" class="btn btn-success">
                                Volver Al Inicio
                                <img src="https://cdn-icons-png.flaticon.com/512/13/13964.png" alt="Icono de Volver"
                                    class="icon-sca">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
