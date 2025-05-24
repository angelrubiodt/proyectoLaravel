<!doctype html>
<html lang="es">
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      html, body {
        margin: 0;
        padding: 0;
        min-height: 100%;
      }
      .navbar {
        padding: 0.5rem 0;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        margin-bottom: 2.5rem;
      }
      .brand-logo {
        max-height: 60px;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 4px;
      }
      .brand-title {
        font-family: 'Segoe UI', Arial, sans-serif;
        font-weight: 700;
        font-size: 2rem;
        color: #fff;
        margin-left: 15px;
        letter-spacing: 1px;
        text-shadow: 1px 1px 2px #0002;
      }
      .navbar-nav .nav-link {
        font-size: 1.1rem;
        font-weight: 500;
        color: #fff !important;
        margin: 0 8px;
        border-radius: 20px;
        padding: 8px 22px !important;
        transition: background 0.2s, color 0.2s;
      }
      .navbar-nav .nav-link.active, .navbar-nav .nav-link:hover {
        background: #fff;
        color: #0d6efd !important;
      }
      .navbar-nav .nav-link i {
        margin-right: 6px;
      }
      @media (max-width: 991px) {
        .brand-title {
          font-size: 1.3rem;
        }
        .brand-logo {
          max-height: 40px;
        }
      }
      .content-wrapper {
        padding: 0;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary shadow-sm">
      <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center" href="/">
          <img src="{{ asset('images/logoMinaSanPedro.png') }}" alt="Logo Mina San Pedro" class="brand-logo">
          <span class="brand-title">Mina San Pedro</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Menú de navegación">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav align-items-center ms-4">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">
                <i class="fas fa-home"></i>Inicio
              </a>
            </li>
            <!-- Puedes agregar más secciones aquí -->
          </ul>
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
