@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-2">
                <div class="card text-center shadow-lg">
                    <div class="card-header text-center text-white" id="primary-color">
                        {{ __('Restablecer Contraseña') }}
                    </div>
                    <div class="card-body text-center shadow-lg">
                        @if (session('status'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row">
                                <!-- Correo Electrónico -->
                                <label for="email" class="form-label">
                                    {{ __('Correo Electrónico') }}
                                </label>
                                <div class="col-md-12 mb-2">
                                    <input id="email" placeholder="Ej. example@gmail.com" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-grid gap-2 pt-2">
                                <button type="submit" class="btn text-white" id="primary-color">
                                    {{ __('Enviar Enlace De Restablecimiento') }}
                                    <img src="https://cdn-icons-png.flaticon.com/512/3675/3675672.png" alt="Icono de Restablecimiento" class="icon-sca">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
