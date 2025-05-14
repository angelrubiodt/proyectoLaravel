<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logoMinaSanPedro.png') }}" type="image/png" sizes="32x32" />

    <title>San Pedro</title>

    @yield('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Agregamos estilos personalizados -->
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      .navbar {
        padding: 0.5rem 0;
      }

      .hover-effect:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transition: background-color 0.3s ease;
      }

      html, body {
        margin: 0;
        padding: 0;
        min-height: 100%;
      }

      .header-title {
        margin: 0;
        padding: 1rem;
        line-height: 1;
        display: block;
      }

      .container {
        margin-top: 1rem !important;
        padding-top: 0 !important;
      }

      .content-wrapper {
        padding: 0;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid justify-content-center">
        <div class="d-flex justify-content-center align-items-center w-100" style="max-width: 1400px;">
          <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('images/logoMinaSanPedro.png') }}" alt="Logo Mina San Pedro" style="max-height: 80px;">
            <span class="ms-3 fs-3">Mina San Pedro</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav ms-5">
              <li class="nav-item">
                <a class="nav-link active fs-5 px-4 rounded-pill hover-effect" aria-current="page" href="/">Inicio</a>
              </li>
              <!-- Aquí puedes agregar más elementos del menú si lo necesitas -->
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div class="container content-wrapper">
      @yield('contenido')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('js')

  </body>
</html>
