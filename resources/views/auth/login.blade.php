@extends('layouts.master-without-nav')
@section('title') Login @endsection
@section('body') <body class="account-pages"> @endsection
@section('content')

<!-- Begin page -->
<div class="accountbg" style="background: url('{{ asset('assets/images/bg.jpg') }}');background-size: cover;background-position: center;"></div>

<div class="wrapper-page account-page-full">
    <div class="card shadow-none">
        <div class="card-block">
            <div class="account-box">
                <div class="card-box shadow-none p-4">
                    <div class="p-2">
                        <div class="text-center mt-4">
                            <a href="{{ url('/') }}" class="logo logo-dark">
                                <span class="logo-lg">
                                    <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="40">
                                </span>
                            </a>
                            <a href="{{ url('/') }}" class="logo logo-light">
                                <span class="logo-lg">
                                    <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="40">
                                </span>
                            </a>
                        </div>

                        <h4 class="font-size-18 mt-5 text-center">¡Bienvenido de nuevo!</h4>
                        <p class="text-muted text-center">Inicia sesión para continuar en InmoGest.</p>

                        <form class="mt-4" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="email">Correo electrónico</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Introduce tu correo">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="password">Contraseña</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required placeholder="Introduce tu contraseña">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Recordarme</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Ingresar</button>
                                </div>
                            </div>

                            <div class="mb-3 mt-2 mb-0 row">
                                <div class="col-12 mt-3">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}"><i class="mdi mdi-lock"></i> ¿Olvidaste tu contraseña?</a>
                                    @endif
                                </div>
                            </div>
                        </form>

                        <div class="mt-5 pt-4 text-center">
                            {{-- <p>¿No tienes cuenta? <a href="{{ route('register') }}" class="fw-medium text-primary"> Regístrate </a> </p> --}}
                            <p>© <script>document.write(new Date().getFullYear())</script> InmoGest. Desarrollado por <i class="mdi mdi-heart text-danger"></i> Themesbrand</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection