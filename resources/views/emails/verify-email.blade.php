<!DOCTYPE html>
<html>
<head>
    <title>Verifica tu correo electrónico</title>
</head>
<body>
    <h1>¡Bienvenido a {{ config('app.name') }}!</h1>

    <p>Gracias por registrarte. Por favor, verifica tu dirección de correo electrónico haciendo clic en el siguiente enlace:</p>

    <a href="{{ $verificationUrl }}" style="background-color: #4CAF50; color: white; padding: 14px 20px; text-decoration: none; border-radius: 4px;">
        Verificar correo electrónico
    </a>

    <p>Si no creaste una cuenta, no es necesario realizar ninguna acción.</p>

    <p>Saludos,<br>{{ config('app.name') }}</p>
</body>
</html>
