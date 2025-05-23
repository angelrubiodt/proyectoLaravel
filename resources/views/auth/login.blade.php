@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;">
    <div class="row justify-content-center w-100">
        <div class="col-md-4">
            <div class="card" style="border-radius: 24px; box-shadow: 0 8px 24px rgba(0,0,0,0.10); border: none; max-width: 350px; margin: auto;">
                <div class="card-header" style="background: #007bff; color: white; border-radius: 24px 24px 0 0; padding: 22px 18px 12px 18px; border: none; text-align: center;">
                    <h4 class="mb-1" style="font-weight: 700; font-size: 1.3em;">Bienvenido</h4>
                    <p class="mb-0" style="opacity: 0.95; font-size: 1em;">Inicia sesión para continuar</p>
                </div>
                <div class="card-body" style="padding: 24px 18px 18px 18px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3" style="width: 100%;">
                            <label for="email" style="color: #333; font-weight: 500; margin-bottom: 6px; font-size: 0.98em;">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                style="border-radius: 14px; padding: 10px 12px; border: 1.5px solid #007bff; font-size: 0.98em; width: 100%;">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3" style="width: 100%;">
                            <label for="password" style="color: #333; font-weight: 500; margin-bottom: 6px; font-size: 0.98em;">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password"
                                style="border-radius: 14px; padding: 10px 12px; border: 1.5px solid #007bff; font-size: 0.98em; width: 100%;">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 d-flex align-items-center" style="width: 100%;">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                                style="border-radius: 4px; border: 1.5px solid #007bff; margin-right: 8px;">
                            <label class="form-check-label" for="remember" style="color: #666; font-size: 0.97em;">
                                Recordarme
                            </label>
                        </div>
                        <div class="form-group mb-3" style="width: 100%;">
                            <button type="submit" class="btn w-100"
                                style="background: #007bff; color: white; border: none; border-radius: 14px; padding: 10px 0; font-weight: 600; font-size: 1em; box-shadow: 0 4px 12px rgba(0,123,255,0.13); transition: background 0.2s; width: 100%;">
                                Iniciar Sesión
                            </button>
                        </div>
                        @if (Route::has('password.request'))
                            <div class="text-center mb-2">
                                <a href="{{ route('password.request') }}" style="color: #007bff; text-decoration: none; font-size: 0.97em;">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        @endif
                        <div class="text-center">
                            <p style="color: #666; margin-bottom: 0; font-size: 0.97em;">
                                ¿No tienes una cuenta?
                                <a href="{{ route('register') }}" style="color: #007bff; text-decoration: none; font-weight: 500;">
                                    Regístrate aquí
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
