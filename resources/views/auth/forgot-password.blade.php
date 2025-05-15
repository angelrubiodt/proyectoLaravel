@extends('layouts.app')

@section('title', 'Mina San Pedro - Recuperar contraseña')

@section('content')
<div class="container" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;">
    <div class="row justify-content-center w-100">
        <div class="col-md-4">
            <div class="card" style="border-radius: 24px; box-shadow: 0 8px 24px rgba(0,0,0,0.10); border: none; max-width: 350px; margin: auto;">
                <div class="card-header" style="background: #007bff; color: white; border-radius: 24px 24px 0 0; padding: 22px 18px 12px 18px; border: none; text-align: center;">
                    <h4 class="mb-1" style="font-weight: 700; font-size: 1.3em;">¿Olvidaste tu contraseña?</h4>
                    <p class="mb-0" style="opacity: 0.95; font-size: 1em;">Ingresa tu correo para recibir el enlace de recuperación</p>
                </div>
                <div class="card-body" style="padding: 24px 18px 18px 18px;">
                    @if (session('status'))
                        <div class="alert alert-success" style="font-size: 0.97em;">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" style="font-size: 0.97em;">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group mb-4" style="width: 100%;">
                            <label for="email" style="color: #333; font-weight: 500; margin-bottom: 6px; font-size: 0.98em;">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autofocus
                                style="border-radius: 14px; padding: 10px 12px; border: 1.5px solid #007bff; font-size: 0.98em; width: 100%;">
                        </div>
                        <div class="form-group mb-4" style="width: 100%;">
                            <button type="submit" class="btn w-100"
                                style="background: #007bff; color: white; border: none; border-radius: 14px; padding: 10px 0; font-weight: 600; font-size: 1em; box-shadow: 0 4px 12px rgba(0,123,255,0.13); transition: background 0.2s; width: 100%; margin-top: 10px;">
                                Enviar enlace de recuperación
                            </button>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('login') }}" style="color: #007bff; text-decoration: none; font-size: 0.97em;">Volver al inicio de sesión</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
