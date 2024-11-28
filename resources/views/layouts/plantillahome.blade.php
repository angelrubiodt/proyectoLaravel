<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>San Pedro</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="main-layout">
    <div class="logo-container">
        <img src="{{ asset('images/logoMinaSanPedro.png') }}" alt="Logo Mina San Pedro" class="site-logo">
    </div>
    @yield('content')
    <footer>
        <div class="footer bottom_cross1">
           <div class="container">
              <div class="row">
                 <div class="col-md-4">
                    <ul class="location_icon">
                       <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> Mina San Pedro <br> Guayabal Tolima
                       </li>
                       <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>Teléfono :  +57 3233877725</li>
                       <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>Email : sanpedro@gmail.com</li>
                    </ul>
                    <form class="bottom_form">
                       <h3>Newsletter</h3>
                       <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                       <button class="sub_btn">subscribe</button>
                    </form>
                 </div>
                 <div class="col-md-8">
                    <div class="map">
                       <figure><img src="{{ asset('images/map.png') }}" alt="#"/></figure>
                    </div>
                 </div>
              </div>
           </div>
           <div class="copyright">
              <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                       <p>© 2024 Mina San Pedro - Guayabal Tolima</a></p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </footer>
    <!-- JavaScript -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
       function openNav() {
         document.getElementById("mySidepanel").style.width = "250px";
       }

       function closeNav() {
         document.getElementById("mySidepanel").style.width = "0";
       }
    </script>
    <script>
        document.getElementById('userMenuBtn').addEventListener('click', function(e) {
            e.preventDefault();
            const dropdownMenu = document.getElementById('userDropdownMenu');
            dropdownMenu.classList.toggle('show');
        });

        // Cerrar el menú cuando se hace clic fuera de él
        document.addEventListener('click', function(e) {
            const dropdownMenu = document.getElementById('userDropdownMenu');
            const userMenuBtn = document.getElementById('userMenuBtn');

            if (!userMenuBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    </script>
</body>
</html>
