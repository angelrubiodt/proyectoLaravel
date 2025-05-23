@extends('layouts.plantillahome')
@section('content')
<style>
    .transfot_form {
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 12px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        width: 100%;
    }
    .transfot_form:focus {
        border-color: #007bff;
        box-shadow: 0 0 6px rgba(0,123,255,0.3);
        outline: none;
    }
    .get_now {
        border-radius: 5px;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 12px 24px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        font-size: 16px;
        width: 100%;
        margin-top: 15px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }
    .get_now:hover {
        background-color: #0056b3;
        box-shadow: 0 3px 6px rgba(0,0,0,0.3);
        transform: translateY(-2px);
    }
    

    
    /* Estilos para el formulario de contacto */
    .contact {
        padding: 80px 0;
    }
    
    .contact form {
        margin-top: 30px;
    }
    
    .contact input,
    .contact textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }
    
    .contact input:focus,
    .contact textarea:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        outline: none;
    }


    
    /* Estilos para el newsletter */
    .newsletter {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
        padding: 60px 0;
        margin-top: 80px;
    }

    .newsletter .container {
        max-width: 1000px;
    }

    .newsletter h2 {
        color: white;
        font-size: 2.5rem;
        margin-bottom: 20px;
        text-align: center;
    }

    .newsletter p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.1rem;
        margin-bottom: 30px;
        text-align: center;
    }

    .newsletter-form {
        display: flex;
        gap: 15px;
        justify-content: center;
        max-width: 600px;
        margin: 0 auto;
    }

    .newsletter-form input[type="email"] {
        flex: 1;
        padding: 15px 20px;
        border: none;
        border-radius: 30px;
        font-size: 1rem;
        outline: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .newsletter-form input[type="email"]:focus {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .newsletter-form button {
        padding: 15px 40px;
        background: white;
        color: #007bff;
        border: none;
        border-radius: 30px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .newsletter-form button:hover {
        background: #0056b3;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .newsletter-form button:active {
        transform: translateY(0);
    }

    /* Estilos para la sección de servicios */
    .service_box {
        transition: all 0.3s ease;
        cursor: pointer;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .service_box:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .service_box img {
        transition: all 0.3s ease;
        margin-bottom: 15px;
    }
    
    .service_box:hover img {
        transform: scale(1.1);
    }
    
    .service_box h4 {
        margin: 0;
        font-size: 1.2rem;
        color: #333;
    }
    .alert {
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 5px;
    }
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    .carousel-caption {
        padding: 20px;
    }
    .text-bg h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }
    .text-bg span {
        font-size: 1.1rem;
        line-height: 1.6;
    }
    .ban_track figure img {
        border-radius: 15px;
        background: none;
        box-shadow: none;
        border: none;
    }

    /* Estilos para los botones de navegación del slider */
    /* Estilos para los botones de navegación del slider */
    .carousel-indicators {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }
    
    .carousel-indicators li {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        margin: 0 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .carousel-indicators li:hover,
    .carousel-indicators .active {
        background-color: #fff;
        width: 15px;
        height: 15px;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        opacity: 0.8;
        transition: all 0.3s ease;
        z-index: 10;
    }
    
    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        opacity: 1;
        background: rgba(0, 0, 0, 0.7);
    }
    
    .carousel-control-prev {
        left: 20px;
    }
    
    .carousel-control-next {
        right: 20px;
    }
    
    .carousel-control-prev i,
    .carousel-control-next i {
        font-size: 24px;
        color: #fff;
        line-height: 50px;
        margin: 0;
    }
</style>
      <!-- loader  -->
        <div class="loader_bg">
            <div class="loader"><img src="images/loading.gif" alt="#" /></div>
        </div>
        <!-- end loader -->
        <div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="{{ url('/') }}">Inicio </a>
            <a href="#about">Sobre nosotros</a>
            <a href="#service">Services  </a>
            <a href="#contact">Contact</a>
        </div>
        <!-- header -->
        <header>
            <!-- header inner -->
            <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="right_bottun">
                        <ul class="conat_info d_none ">
                            <li class="user-menu-container">
                                <a href="#" id="userMenuBtn"><i class="fa fa-user" aria-hidden="true"></i></a>
                                <div class="user-dropdown-menu" id="userDropdownMenu">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="dropdown-item">Productos</a>
                                        <a href="{{ route('logout') }}" 
                                           onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();"
                                           class="dropdown-item">Cerrar Sesión</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="dropdown-item">Inicio de sesión</a>
                                    @endauth
                                </div>
                            </li>
                            <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        </ul>
                        <button class="openbtn" onclick="openNav()"><img src="images/menu_icon.png" alt="#"/> </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </header>
        <!-- end header inner -->
        <!-- end header -->
        <!-- banner -->
        <section class="banner_main">
            <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#banner1" data-slide-to="0" class="active"></li>
                    <li data-target="#banner1" data-slide-to="1"></li>
                    <li data-target="#banner1" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid">
                            <div class="carousel-caption">
                                <div class="row">
                                    <div class="col-md-7 col-lg-5">
                                        <div class="text-bg">
                                            <h1>El mejor material para tus proyectos de construcción</h1>
                                            <span>Nuestro equipo especializado garantiza la calidad y eficiencia en la extracción y suministro de materiales de construcción. Contamos con tecnología de punta para ofrecer los mejores resultados.</span>
                                            <a class="read_more" href="#contact">Contact Us</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-7">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="ban_track">
                                                    <figure><img src="images/track.png" alt="Equipo de extracción"/></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container-fluid">
                            <div class="carousel-caption">
                                <div class="row">
                                    <div class="col-md-7 col-lg-5">
                                        <div class="text-bg">
                                            <h1>Extracción de materiales de alta calidad</h1>
                                            <span>Nuestro equipo especializado garantiza la calidad y eficiencia en la extracción de materiales. Contamos con tecnología de punta y procesos optimizados para ofrecer los mejores resultados.</span>
                                            <a class="read_more" href="#contact">Contact Us</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-7">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="ban_track">
                                                    <figure><img src="images/track.png" alt="Extracción"/></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container-fluid">
                            <div class="carousel-caption">
                                <div class="row">
                                    <div class="col-md-7 col-lg-5">
                                        <div class="text-bg">
                                            <h1>Logística y transporte eficiente</h1>
                                            <span>Nuestro sistema de logística y transporte asegura que tus materiales lleguen a tiempo y en perfectas condiciones. Contamos con flota propia y personal capacitado.</span>
                                            <a class="read_more" href="#contact">Contact Us</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-7">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="ban_track">
                                                    <figure><img src="images/track.png" alt="Transporte"/></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </a>
                <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </a>
            </div>
        </section>
        <!-- end banner -->
        <!-- about section -->
        <div id="about" class="about ">
            <div class="container" style="margin-top: 50px;">
            <div class="row d_flex">
                <div class="col-md-6">
                    <div class="about_right">
                        <figure><img src="images/about.png" alt="#"/></figure>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="titlepage">
                        <h2>Sobre nosotros</h2>
                        <p>En Mina San Pedro, contamos con años de experiencia en la extracción y suministro de materiales de alta calidad como grava, arena y asfalto. Nos destacamos por ofrecer productos confiables y un servicio eficiente, adaptado a las necesidades de cada proyecto.

                            Comprometidos con la calidad y la sostenibilidad, trabajamos con tecnología avanzada y un equipo profesional para garantizar soluciones responsables y efectivas.

                            Tu proyecto, nuestro compromiso.
                        </p>
                        <a class="read_more" href="#">Read More</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- about section -->
        <!-- service section -->
        <div id="service" class="service">
            <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="titlepage">
                        <h2>Nuestros Servicios</h2>
                        <p>Ofrecemos soluciones integrales para satisfacer las necesidades de tus proyectos:</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service_main">
                        <div class="service_box blu_colo" style="margin: 10px;">
                            <img src="images/extracción de materiales.png" alt="#" style="max-width: 80%; max-height: 80%;"/>
                            <h4>Extracción de materiales</h4>
                        </div>
                        <div class="service_box yelldark_colo" style="margin: 10px;">
                            <img src="images/procesamiento de materiales.png" alt="#" style="max-width: 80%; max-height: 80%;"/>
                            <h4>Procesamiento de materiales</h4>
                        </div>
                        <div class="service_box yell_colo" style="margin: 10px;">
                            <img src="images/asesoría personalizada.png" alt="#" style="max-width: 80%; max-height: 80%;"/>
                            <h4>Asesoría personalizada</h4>
                        </div>
                        <div class="service_box yelldark_colo" style="margin: 10px;">
                            <img src="images/logística y transporte.png" alt="#" style="max-width: 80%; max-height: 80%;"/>
                            <h4>Logística y transporte</h4>
                        </div>
                        <div class="service_box yell_colo" style="margin: 10px;">
                            <img src="images/producción personalizada.png" alt="#" style="max-width: 80%; max-height: 80%;"/>
                            <h4>Producción personalizada</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Eliminado el botón Read More -->
                </div>
            </div>
            </div>
        </div>
        <!-- end service section -->
        <div id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>¡Contáctanos!</h2>
                            <p>Dejanos tus datos para que podamos contactarte</p>

                        </div>
                        @if(session('success'))
                            <div class="alert {{ session('success_class') }}">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert {{ session('error_class') }}">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form id="contactForm" action="{{ route('contacto.store') }}" method="POST" class="main_form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="contactus" placeholder="Tu nombre" type="text" name="nombre" required>
                                    @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input class="contactus" placeholder="Tu número de teléfono" type="tel" name="telefono" required>
                                    @error('telefono')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <textarea class="contactusmess" placeholder="¿En qué podemos ayudarte?" name="mensaje" required></textarea>
                                    @error('mensaje')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="send_btn">Enviar datos</button>
                                </div>
                            </div>
                        </form>

                        <!-- Scripts para SweetAlert2 -->
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.getElementById('contactForm').addEventListener('submit', function(e) {
                                e.preventDefault();
                                
                                Swal.fire({
                                    title: 'Enviando...',
                                    html: 'Por favor, espere...',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });

                                const formData = new FormData(this);
                                fetch(this.action, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: formData
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Error en la respuesta del servidor');
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    if (data.status === 'success') {
                                        Swal.fire({
                                            icon: 'success',
                                            title: '¡Éxito!',
                                            text: data.message,
                                            confirmButtonText: '¡Perfecto!',
                                            confirmButtonColor: '#4CAF50'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                this.reset();
                                            }
                                        });
                                    } else {
                                        if (data.errors) {
                                            let errorText = 'Errores encontrados:\n';
                                            Object.entries(data.errors).forEach(([field, messages]) => {
                                                errorText += `\n${field}: ${messages[0]}`;
                                            });
                                            Swal.fire({
                                                icon: 'error',
                                                title: '¡Error!',
                                                text: errorText,
                                                confirmButtonText: '¡Volver a intentar!',
                                                confirmButtonColor: '#f44336'
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: '¡Error!',
                                                text: data.message || 'Error al enviar el mensaje',
                                                confirmButtonText: '¡Volver a intentar!',
                                                confirmButtonColor: '#f44336'
                                            });
                                        }
                                    }
                                })
                                .catch(error => {
                                    Swal.fire({
                                        icon: 'error',
                                        title: '¡Error!',
                                        text: 'Ha ocurrido un error. Por favor, inténtelo de nuevo.',
                                        confirmButtonText: '¡Volver a intentar!',
                                        confirmButtonColor: '#f44336'
                                    });
                                });
                            });
                        </script>
                    </div>
                    <div class="col-md-6">
                        <div class="co_tru">
                            <figure>
                                <img src="images/excavadoraVolqueta.png" alt="#" style="max-width: 100%; height: auto; border-radius: 10px;"/>
                            </figure>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end contact section -->


        <!-- Newsletter section -->
        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>¡Mantente al día con nuestras novedades!</h2>
                        <p>Recibe las últimas noticias sobre nuestros productos y servicios directamente en tu correo.</p>
                        <form class="newsletter-form" action="{{ route('newsletter.store') }}" method="POST">
                            @csrf
                            <input type="email" name="email" placeholder="Tu correo electrónico" required>
                            <button type="submit">Suscribirse</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end newsletter -->
@endsection
