@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <strong>¡Error!</strong> {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        @endforeach
                    </div>
                @endif

                <div class="card shadow-lg">
                    <div class="card-header text-center text-white fs-5" id="primary-color">
                        Bitácora De Asistencia
                        <img src="https://cdn-icons-png.flaticon.com/512/2921/2921075.png" alt="Icono de Registro de Asistencia"
                            class="icon-sca">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <h1 class="h1 text-center">
                                    {{ \Carbon\Carbon::now('GMT-6')->format('d') }}
                                    {{ \Carbon\Carbon::now('GMT-6')->format('F') }}
                                    {{ \Carbon\Carbon::now('GMT-6')->format('Y') }}
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <h1 class="display-6 text-center" id="current-time"></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid gap-2 mt-3">
                                <!-- Modal: Registrar Asistencia -->
                                <button type="button" class="btn btn-success btn-lg mx-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalRA">
                                    Registrar Asistencia
                                    <img src="https://cdn-icons-png.flaticon.com/512/3596/3596092.png"
                                        alt="Icono de Entrada" class="icon-sca">
                                </button>
                                <!-- Modal: Registrar Asistencia -->
                                <div class="modal fade" id="exampleModalRA" tabindex="-1"
                                    aria-labelledby="exampleModalRALabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h5 class="modal-title text-white" id="exampleModalRALabel">
                                                    Registrar Asistencia Por Matrícula
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="p">
                                                    Ingresa tu matrícula para corroborar tus datos y registrar tu
                                                    asistencia.
                                                </p>
                                                <form action="{{ route('input') }}" method="POST">
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
                                                        <button class="btn btn-success" type="submit">
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
                                <!-- Modal: Registrar Salida -->
                                <button type="button" class="btn btn-danger btn-lg mx-1 mt-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalRS">
                                    Registrar Salida
                                    <img src="https://cdn-icons-png.flaticon.com/512/1828/1828479.png"
                                        alt="Icono de Salida" class="icon-sca">
                                </button>
                                <!-- Modal: Registrar Salida -->
                                <div class="modal fade" id="exampleModalRS" tabindex="-1"
                                    aria-labelledby="exampleModalRSLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title text-white" id="exampleModalRSLabel">
                                                    Registrar Salida Por Matrícula
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="p">
                                                    Ingresa tu matrícula para corroborar tus datos y registrar tu salida.
                                                </p>
                                                <form action="{{ route('output') }}" method="POST">
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
                                                        <button class="btn btn-danger" type="submit">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: Logotipo -->
    <button type="button" class="btn btn-dark btn-lg mx-1 boton-flotante" data-bs-toggle="modal"
        data-bs-target="#exampleModalL">
        Logotipo
    </button>
    <!-- Modal: Logotipo -->
    <div class="modal fade" id="exampleModalL" tabindex="-1" aria-labelledby="exampleModalLLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLLabel">
                        Acerca De...
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <script>
        function updateTime() {
            const currentTime = new Date();
            const formattedTime = currentTime.toLocaleTimeString();
            document.getElementById('current-time').textContent = formattedTime;
        }

        updateTime();

        setInterval(updateTime, 1000);
    </script>
@endsection
