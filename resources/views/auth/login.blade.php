@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="mt-3">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <img src="{{ asset('assets/img/logo-utzac.png') }}" class="img-fluid" alt="Logo de UTZAC">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="text-center">
                            Sistema Control Asistencia<br>
                            <hr>
                            <small class="text-muted">Inicia Sesión</small>
                        </h3>
                        <div class="card mt-3 shadow-lg">
                            <div class="card-body">
                                <!-- Correo Electrónico -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="formExample">Correo Electrónico</label>
                                    <input type="email" id="formExample"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
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
                                        name="password" value="{{ old('password') }}" required autocomplete="current-password" placeholder="Contraseña" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Recuérdame -->
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Recuérdame') }}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="link" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste Tú Contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="d-grid gap-2 text-center text-lg-start mt-3">
                                    <button type="submit" class="btn text-white" id="primary-color">
                                        {{ __('Entrar') }}
                                        <img src="https://cdn-icons-png.flaticon.com/512/2623/2623062.png"
                                            alt="Icono de Iniciar Sesión" class="icon-sca">
                                    </button>
                                    <p class="mt-2 text-center">
                                        ¿Aún No Tienes Cuenta?
                                        <a href="{{ route('register') }}" class="link">Regístrate</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
