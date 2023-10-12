@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header text-white" id="primary-color">{{ __('Regístrate') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <!-- Nombre -->
                                <div class="col-md-4 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="name">Nombre(s)</label>
                                        <input type="text" id="name"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            placeholder="Nombre(s)" name="name" value="{{ old('name') }}" required
                                            autofocus />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Apellido Paterno -->
                                <div class="col-md-4 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="apellidoPaterno">Apellido Paterno</label>
                                        <input type="text" id="apellidoPaterno" class="form-control form-control-lg"
                                            placeholder="A. Paterno" name="apellido_paterno"
                                            value="{{ old('apellido_paterno') }}" required />
                                    </div>
                                </div>
                                <!-- Apellido Materno -->
                                <div class="col-md-4 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="apellidoMaterno">Apellido Materno</label>
                                        <input type="text" id="apellidoMaterno" class="form-control form-control-lg"
                                            placeholder="A. Materno" name="apellido_materno"
                                            value="{{ old('apellido_materno') }}" required />
                                    </div>
                                </div>
                            </div>
                            <!-- Correo Electrónico -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="formExample">Correo Electrónico</label>
                                <input type="email" id="formExample"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Ej. example@gmail.com" autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Contraseña -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form1Example2">Contraseña</label>
                                <input type="password" id="form1Example2"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password" value="{{ old('password') }}" required autocomplete="current-password"
                                    placeholder="Contraseña" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-grid gap-2 text-center text-lg-start mt-4">
                                <button type="submit" class="btn text-white" id="primary-color">
                                    {{ __('Registrar') }}
                                    <img src="https://cdn-icons-png.flaticon.com/512/2623/2623062.png"
                                        alt="Icono de Registro" class="icon-sca">
                                </button>
                                <p class="mt-3 text-center">
                                    ¿Ya Posees Una Cuenta?
                                    <a href="{{ route('login') }}" class="link">Inicia Sesión</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
