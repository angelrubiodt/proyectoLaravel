@extends('layouts.plantillahome')
@section('content')
<style>
    .transfot_form {
        border-radius: 20px;
        border: 1px solid #ccc;
        padding: 10px 15px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .transfot_form:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0,123,255,0.3);
    }
    .get_now {
        border-radius: 20px;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    }
    .get_now:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
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
                                    @else
                                        <a href="{{ route('login') }}" class="dropdown-item">Inicio de sesión</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="dropdown-item">Registrarse</a>
                                        @endif
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
                                    <span>Contamos con años de experiencia en la extracción y suministro de materiales de alta calidad como grava, asfalto, arena y más. Nos comprometemos a ofrecer soluciones confiables para tus proyectos de construcción e infraestructura. Calidad, eficiencia y servicio están a tu alcance. </span>
                                    <a class="read_more" href="#">Contact Us</a>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-7">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="ban_track">
                                        <figure><img src="images/track.png" alt="#"/></figure>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <form class="transfot" action="{{ route('cotizacion.store') }}" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <span>Servicios Profesionales</span>
                                            <h3>Obtén tu cotización</h3>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Origen" type="text" name="origen" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Destino" type="text" name="destino" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Correo electrónico" type="email" name="email" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Teléfono" type="text" name="telefono" required>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="get_now" type="submit" style="font-size: 0.9em; padding: 8px 15px;">Cotizar ahora</button>
                                        </div>
                                    </form>
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
                                    <h1>El mejor material para tus proyectos de construcción</h1>
                                    <span>Contamos con años de experiencia en la extracción y suministro de materiales de alta calidad como grava, asfalto, arena y más. Nos comprometemos a ofrecer soluciones confiables para tus proyectos de construcción e infraestructura. Calidad, eficiencia y servicio están a tu alcance.</span>
                                    <a class="read_more" href="#">Contact Us</a>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-7">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="ban_track">
                                        <figure><img src="images/track.png" alt="#"/></figure>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <form class="transfot" action="{{ route('cotizacion.store') }}" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <span>Servicios Profesionales</span>
                                            <h3>Obtén tu cotización</h3>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Origen" type="text" name="origen" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Destino" type="text" name="destino" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Correo electrónico" type="email" name="email" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Teléfono" type="text" name="telefono" required>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="get_now" type="submit" style="font-size: 0.9em; padding: 8px 15px;">Cotizar ahora</button>
                                        </div>
                                    </form>
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
                                    <h1>El mejor material para tus proyectos de construcción</h1>
                                    <span>Contamos con años de experiencia en la extracción y suministro de materiales de alta calidad como grava, asfalto, arena y más. Nos comprometemos a ofrecer soluciones confiables para tus proyectos de construcción e infraestructura. Calidad, eficiencia y servicio están a tu alcance.</span>
                                    <a class="read_more" href="#">Contact Us</a>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-7">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="ban_track">
                                        <figure><img src="images/track.png" alt="#"/></figure>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <form class="transfot" action="{{ route('cotizacion.store') }}" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <span>Servicios Profesionales</span>
                                            <h3>Obtén tu cotización</h3>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Origen" type="text" name="origen" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Destino" type="text" name="destino" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Correo electrónico" type="email" name="email" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="transfot_form" placeholder="Teléfono" type="text" name="telefono" required>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="get_now" type="submit" style="font-size: 0.9em; padding: 8px 15px;">Cotizar ahora</button>
                                        </div>
                                    </form>
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
            <div class="container">
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
                    <a class="read_more" href="#">Read More</a>
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
                            <h2>Contáctanos</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="con_bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5">
                            <form id="request" class="main_form">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <input class="contactus" placeholder="Nombre" type="text" name="Name">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="contactus" placeholder="Correo Electrónico" type="email" name="Email">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="contactus" placeholder="Número de Teléfono" type="tel" name="Phone Number">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="contactusmess" placeholder="Mensaje" type="text" name="Message">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="send_btn">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <div class="co_tru">
                                <figure>
                                    <img src="images/excavadoraVolqueta.png" alt="#" style="max-width: 50%; height: auto; border-radius: 10px;"/>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end contact section -->
@endsection
