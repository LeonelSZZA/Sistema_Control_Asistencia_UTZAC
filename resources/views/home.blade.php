@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

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
                            <div class="col-md-6 mt-1 text-white fs-5">
                                ➤ Panel De Asistencias
                            </div>
                            <div class="col-md-6 d-flex flex-row-reverse">
                                <!-- Modal: Generar Reporte Individual -->
                                <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalGRI">
                                    Generar Reporte Individual
                                    <img src="https://cdn-icons-png.flaticon.com/512/8992/8992459.png"
                                        alt="Icono de Usuario" class="icon-sca">
                                </button>
                                <!-- Modal: Generar Reporte Individual -->
                                <div class="modal fade" id="exampleModalGRI" tabindex="-1"
                                    aria-labelledby="exampleModalGRILabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title text-white" id="exampleModalGRILabel">
                                                    Generar Historial PDF Individual
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="p">
                                                    Ingrese el periodo de tiempo inicial y final junto con la matrícula
                                                    de un estudiante para conocer su historial de asistencia.
                                                </p>
                                                <form action="{{ route('reportIndividual') }}" method="GET">
                                                    @csrf
                                                    <div class="row mb-2">
                                                        <!-- Mes | Año -->
                                                        <div class="form-group">
                                                            <label class="form-label text-dark">
                                                                Ingresa El Periodio Inicial
                                                            </label>
                                                            <input class="form-control form-control-lg" type="date"
                                                                name="fecha_inicial" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <!-- Mes | Año -->
                                                        <div class="form-group">
                                                            <label class="form-label text-dark">
                                                                Ingresa El Periodo Final
                                                            </label>
                                                            <input class="form-control form-control-lg" type="date"
                                                                name="fecha_final" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!-- Matrícula -->
                                                        <div class="col-md-12 mb-2">
                                                            <div class="form-outline">
                                                                <label class="form-label text-dark" for="matricula">
                                                                    Matrícula
                                                                </label>
                                                                <input type="number" id="matricula"
                                                                    class="form-control form-control-lg"
                                                                    placeholder="Ej. 482100078" name="matricula" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-grid gap-2 pt-2">
                                                        <button class="btn btn-danger" type="submit">
                                                            Generar Reporte
                                                            <img src="https://cdn-icons-png.flaticon.com/512/724/724933.png"
                                                                alt="Icono de Descarga" class="icon-sca">
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal: Generar Reporte General -->
                                <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalGRG">
                                    Generar Reporte General
                                    <img src="https://cdn-icons-png.flaticon.com/512/681/681494.png" alt="Icono de Usuarios" class="icon-sca">
                                </button>
                                <!-- Modal: Generar Reporte General -->
                                <div class="modal fade" id="exampleModalGRG" tabindex="-1"
                                    aria-labelledby="exampleModalGRGLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title text-white" id="exampleModalGRGLabel">
                                                    Generar Historial PDF General
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="p">
                                                    Ingrese el periodo de tiempo inicial y final para conocer de
                                                    manera general los registros de asistencia.
                                                </p>
                                                <form action="{{ route('reportGeneral') }}" method="GET">
                                                    @csrf
                                                    <div class="row mb-2">
                                                        <!-- Mes | Año -->
                                                        <div class="form-group">
                                                            <label class="form-label text-dark">
                                                                Ingresa El Periodio Inicial
                                                            </label>
                                                            <input class="form-control form-control-lg" type="date"
                                                                name="fecha_inicial" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <!-- Mes | Año -->
                                                        <div class="form-group">
                                                            <label class="form-label text-dark">
                                                                Ingresa El Periodo Final
                                                            </label>
                                                            <input class="form-control form-control-lg" type="date"
                                                                name="fecha_final" required>
                                                        </div>
                                                    </div>
                                                    <div class="d-grid gap-2 pt-2">
                                                        <button class="btn btn-danger" type="submit">
                                                            Generar Reporte
                                                            <img src="https://cdn-icons-png.flaticon.com/512/724/724933.png"
                                                                alt="Icono de Descarga" class="icon-sca">
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card shadow-lg">
                                    <div class="card-header text-center text-white" id="primary-color">
                                        Gráfica De Asistencias Mensuales
                                        <img src="https://cdn-icons-png.flaticon.com/512/2838/2838764.png" alt="Icono Mensual"
                                        class="icon-sca">
                                    </div>
                                    <div class="card-body">
                                        <canvas id="asistenciaChart" height="160px"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-deck">
                                    <div class="card shadow-lg">
                                        <div class="card-header text-center text-white" id="primary-color">Asistentes El Día De Hoy:
                                            {{ \Carbon\Carbon::now('GMT-6')->format('d') }}
                                            {{ \Carbon\Carbon::now('GMT-6')->format('F') }}
                                            {{ \Carbon\Carbon::now('GMT-6')->format('Y') }}</div>
                                        <div class="card-body text-center">
                                            <p class="card-text">{{ $cantidadUsuariosAsistieron }} Asistente(s)</p>
                                        </div>
                                    </div>
                                    <div class="card shadow-lg mt-3">
                                        <div class="card-header text-center text-white" id="primary-color">Total De Asistencias</div>
                                        <div class="card-body text-center">
                                            <p class="card-text">{{ $dataAttendance[0]->total_asistencias }} Asistencias
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card shadow-lg mt-3">
                                        <div class="card-header text-center text-white" id="primary-color">Total De Horas Asistidas</div>
                                        <div class="card-body text-center">
                                            <p class="card-text">{{ $dataAttendance[0]->total_horas }} Horas</p>
                                        </div>
                                    </div>
                                    <div class="card shadow-lg mt-3">
                                        <div class="card-header text-center text-white" id="primary-color">Total De Usuarios Activos</div>
                                        <div class="card-body text-center">
                                            <p class="card-text">{{ $users }} Usuarios</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var datosAsistencias = {
            labels: {!! json_encode($meses) !!},
            datasets: [{
                label: 'Asistencias Mensuales',
                data: {!! json_encode($datosAsistencias) !!},
                backgroundColor: 'rgba(186, 45, 59, 1)',
                borderColor: 'rgba(255, 255, 255, 255)',
                borderWidth: 1
            }]
        };

        var opciones = {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    }
                }
            }
        };

        var ctx = document.getElementById('asistenciaChart').getContext('2d');

        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: datosAsistencias,
            options: opciones
        });
    </script>
@endsection
