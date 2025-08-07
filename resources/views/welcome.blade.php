<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gordo's House | Muebles de Diseño y Calidad para tu Hogar</title>
    <meta name="description"
        content="Descubre muebles de diseño y calidad para tu hogar en Gordo's House. Explora nuestro catálogo y encuentra el estilo perfecto. en Buin, Paine y Franklin">
    <meta name="keywords"
        content="muebles, diseño, hogar, decoración, calidad, catálogo, tienda de muebles, ofertas, Franklin, Paine, Buin">
    <!-- Meta robots: aseguramos indexación y seguimiento -->
    <meta name="robots" content="index, follow">

    <!-- Canonical para evitar contenido duplicado -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph para redes sociales -->
    <meta property="og:title" content="Gordo's House | Muebles de Diseño y Calidad para tu Hogar">
    <meta property="og:description" content="Explora nuestro catálogo de muebles exclusivos y transforma tu espacio con estilo y calidad.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}"> <!-- Cambia esta ruta por una imagen representativa -->

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Gordo's House | Muebles de Diseño y Calidad para tu Hogar">
    <meta name="twitter:description" content="Explora nuestro catálogo de muebles exclusivos y transforma tu espacio con estilo y calidad.">
    <meta name="twitter:image" content="{{ asset('images/twitter-card.jpg') }}"> <!-- Cambia esta ruta por una imagen para Twitter -->

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/black_logo.png') }}" type="image/x-icon" />
</head>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Leaflet CSS -->
    <link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
  crossorigin=""
/>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" type="stylesheet">
   


    <style>
        :root {
            --color-bg-main: #ffffff;
            --color-text-main: #091018;
            --color-text-light: #ffffff;
            --color-accent-primary: #29506F;
            --color-btn-primary: #2E22A8;
            --color-accent-secondary: #DBB991;
            --color-accent-highlight: #CBA271;
            --color-accent-muted: #B8AFA7;
            --color-accent-hover: #456D8C;
            --color-accent-success: #89AF6E;
            --color-accent-footer: #000000;

            --font-family-brand: 'Montserrat', sans-serif;
            --font-family-base: 'Lato', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* General */
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-family-base);
            font-size: 18px;
            background-color: var(--color-bg-main);
            color: var(--color-text-main);
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            background-color: rgba(203, 221, 236, 0.8);
            padding: 1rem 2rem;
            border-bottom: 1px solid #ccc;
            backdrop-filter: blur(8px);

        }

        .navbar-brand,
        .navbar-nav .nav-link {
            font-family: var(--font-family-brand);
            font-weight: 400;
            color: var(--color-text-main);
        }

        .navbar-brand {
            font-weight: 900;
        }

        .bg-coffee {
    background-color: #6F4E37; /* Café clásico */
}

        .nav-link:hover {
            color: var(--color-accent-primary);
        }

        /* Header */
        header {
            padding: 6rem 2rem;
            text-align: center;
            background-color: #ffffff;
            color: var(--color-text-main);
        }

        .hero-header {
            background-size: cover;
            background-position: center;
            position: relative;
            height: 100vh;
            min-height: 500px;
        }

        .hero-header .overlay-dark {
            background-color: rgba(255, 255, 255, 0.4);
            /* más claro que antes */
        }

        /* Sections */
        section {
            padding: 3rem 2rem;
            background-color: var(--color-bg-main);
            font-family: var(--font-family-base);
        }

        section h2,
        section h3 {
            font-family: var(--font-family-brand);
            color: var(--color-accent-primary);
        }

        h2{
            color: var(--color-accent-primary);
        }
        section p {
            font-family: var(--font-family-base)
        }



        hr {
            border-color: var(--color-accent-muted);
        }

        /* Cards */
        .card {
            background-color: #ffffff;
            color: var(--color-text-main);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            transition: transform 0.2s ease;
        }

        .card-contact {
            background-color: var(--color-accent-hover);
            justify-content: center;
            align-items: center;
            width: 65em;
            height: 50rem;
            padding: 4em;
            border-radius: 2%;
            color: var(--color-text-light)
        }

        .card-contact h2 {
            color: var(--color-text-light);
        }

        .card:hover .card-contact:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: var(--color-accent-primary);
        }

        .card-text small {
            color: var(--color-accent-muted);
        }

        /* Botones */
        .btn-primary {
            background-color: var(--color-btn-primary);
            color: var(--color-text-light);
            border: none;
            font-family: var(--font-family-brand);
        }

        .btn-primary:hover {
            background-color: var(--color-accent-hover);
        }

        /* Footer */
        footer {
            background-color: var(--color-accent-footer);
            color: var(--color-text-light);
        }

        footer a {
            color: var(--color-text-light);
        }

        footer a:hover {
            color: var(--color-accent-secondary);
        }

        /* Map container */
        .map-container {
            width: 100%;
            height: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            header {
                padding: 4rem 1rem;
            }

            section {
                padding: 2rem 1rem;
            }

        }


        imput {
            background-color: #ffffff;
        }

        .text-font-p {
            font-family: var(--font-family-base);
            font-size: 25px;
        }

        /* WhatsApp Floating Button Styles */
        /* Estilos mínimos para ícono flotante */
        .whatsapp-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .whatsapp-icon img {
            width: 55px;
            height: 55px;
        }

        .product-card {
            position: relative;
            overflow: hidden;
        }

        .product-image-container .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(46, 34, 168, 0.7);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .product-image-container:hover .overlay {
            opacity: 1;
        }
    </style>
</head>

<body class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="navbar-logo me-2" style="width: 60px; height: auto;">
                <span class="gordos-house-text">GORDO'S HOUSE</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#top">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros-carousel">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galery-products">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reviews-section">Reseñas Recientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact-section">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#locations-section">Locales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Intranet</a>
                    </li>

                    
                </ul>
            </div>
        </div>
    </nav>


    <header id="top" class="hero-header position-relative" style="background-image: url('{{ asset('img/banner-test.png') }}'); background-size: cover; background-position: center; height: 500px;">
        <!-- Capa de oscurecimiento -->
        <div class="overlay-dark position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.2); z-index: 1;"></div>

        <!-- Contenido centrado -->
        <div class="container h-100 d-flex justify-content-center align-items-center position-relative z-2 text-center">
            <div class="text-white" style="text-shadow: 0 1px 3px rgba(0,0,0,0.8);">
                <h1 class="display-4 fw-bold mb-4">
                    {{ $settings['banner_title'] ?? 'Gordos House' }}
                </h1>
                <p class="lead fs-4">
                    {{ $settings['banner_subtitle'] ?? 'Muebles que inspiran, Calidad y estilo que perduran' }}
                </p>
                <a href="#products-section" class="btn btn-lg btn-primary mt-4 shadow-lg">
                    Conoce nuestros productos
                </a>
            </div>
        </div>
    </header>



    <main class="container py-5 bl-lgt-cards2">
        <section id="nosotros-carousel" class="container my-5 bg-light">
            <h2 class="text-center fw-bold mb-5">Nuestro viaje hacia tu espacio</h2>

            <div id="nosotrosNarrativo" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <!-- Slide Historia -->
                    <div class="carousel-item active">
                        <div class="p-5 bg-light rounded-4 shadow-sm text-center">
                            <h3 class="mb-4 text-primary-emphasis">📜 Nuestra Historia</h3>
                            <p class="lead text-font-p">Todo comenzó en San Bernardo con un local modesto y un sueño enorme. Nos atrevimos a competir en Franklin, y conquistamos cada metro con esfuerzo, calidad y cariño.</p>
                            <p class="small text-muted">Hoy, seguimos creciendo. Paine y Buin nos reciben como nuevas casas, sin comprometer la calidad ni los precios que nos definen.</p>
                            <span class="badge bg-primary-subtle text-dark mt-2">+20 años creciendo contigo¡</span>
                        </div>
                    </div>

                    <!-- Slide Misión -->
                    <div class="carousel-item">
                        <div class="p-5 bg-light rounded-4 shadow-sm text-center">
                            <h3 class="mb-4 text-success-emphasis">🎯 Misión</h3>
                            <p class="lead">Crear muebles que inspiran y elevan la vida cotidiana. Pensamos en diseño, accesibilidad y propósito para cada rincón de tu hogar.</p>
                            <p class="small text-muted">Cada pieza busca mejorar tu entorno con funcionalidad y belleza.</p>
                            <span class="badge bg-success-subtle text-dark mt-2">Funcionalidad con alma</span>
                        </div>
                    </div>

                    <!-- Slide Visión -->
                    <div class="carousel-item">
                        <div class="p-5 bg-light rounded-4 shadow-sm text-center">
                            <h3 class="mb-4 text-warning-emphasis">🔭 Visión</h3>
                            <p class="lead">Ser referentes por nuestra propuesta estética, servicio comprometido y materiales superiores. Queremos que cada entrega refleje sueños y elegancia con propósito.</p>
                            <p class="small text-muted">Creamos espacios con identidad y durabilidad.</p>
                            <span class="badge bg-warning-subtle text-dark mt-2">Diseño con carácter</span>
                        </div>
                    </div>

                </div>

                <!-- Controles -->
                <button class="carousel-control-prev" type="button" data-bs-target="#nosotrosNarrativo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#nosotrosNarrativo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </section>

        <hr class="my-5">

 <!--   esta es seccion de productos -->


<div class="container mt-4">
    <h2 class="mb-4" id="galery-products">Nuestros Productos</h2>

    <div class="row">
        @forelse ($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="product-image-container position-relative overflow-hidden" style="width: 100%; height: 18rem;">

                    {{-- Imagen visible por defecto --}}
                    <img src="{{ asset('storage/' . $producto->image_path) }}" 
                         alt="{{ $producto->nombre }}" 
                         class="w-100 h-100 object-fit-cover">

                    <div class="position-absolute  overlay top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-primary bg-opacity-75 overlay transition" style="opacity: 0; transition: opacity 0.3s;">
                        <a href="{{ route('products.show', $producto->id) }}" class="btn btn-light">Saber más</a>
                    </div>
                </div>

            <!--    <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>

                    @if($producto->descripcion)
                        <p class="card-text">{{ $producto->descripcion }}</p>
                    @endif

                    
                </div>-->
            </div>
        @empty
            <div class="col-12">
                <p>No hay productos disponibles.</p>
            </div>
        @endforelse
    </div>
</div>

<hr class="my-5">
        <!-- Reseñas Recientes Section -->
      <section class="py-5"
    style="background-image: url('/img/fondo-resenas.png');
           background-size: cover;
           background-position: center;
           background-attachment: fixed;">
    <div class="container" id="reviews-section">
        <div class="row justify-content-center bg-dark bg-opacity-75 p-4 rounded-3 shadow-sm">
            <h2 class="text-center fw-bold mb-4" style="color: #f8f8f8f8; font-family: 'Playfair Display', serif;">
                Lo que dicen nuestros clientes
            </h2>

            @foreach([
              'Excelente servicio, los muebles quedaron justo como se pidió.',
              'La atención fue estupenda, muy servicial y un precio super accesible.',
              'Un lugar que recomendaría sin dudar para comprar el mueble que necesitas.'
            ] as $review)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4"
                         style="background: linear-gradient(to top left, #ffffff, #f8f8f8);">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <p class="card-text fst-italic" style="font-family: 'Lora', serif;">“{{ $review }}”</p>
                            <div class="mt-3 text-end text-muted" style="font-size: 0.9rem;">— Cliente feliz</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
</section>

        <hr class="my-5">

        @include('components.contact-form')

        <hr class="my-5">

        <!-- Donde Estamos Ubicados Section -->
        <section id="locations-section" class="mb-5">
            <h2 class="text-center mb-5">Donde Estamos Ubicados</h2>

            <div class="row">
                @if(isset($locales) && count($locales))

                <div class="col-md-6">


                    <h4>Nuestras Tiendas:</h4>
                    <ul class="list-group">
                        @foreach ($locales as $local)


                        <li class="list-group-item">
                            📍
                            <a href="https://www.google.com/maps?q={{ urlencode($local['direccion']) }}" target="_blank">
                                {{ $local['nombre']}} - {{$local['direccion']}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Columna: mapa Leaflet -->
                <div class="col-md-6">
                    <div
                        id="map"
                        class="map-container"
                        data-locales='{!! json_encode($locales ?? []) !!}'>
                    </div>
                </div>

                @else
                <div class="col-md-12 text-center">
                    <p>No se encontraron locales en la ubicación seleccionada</p>
                </div>
                @endif
            </div>
        </section>
    </main>
 
<footer class="text-white py-4" style="background-color: var(--color-accent-footer);">
    <div class="container">
        <div class="row text-center text-md-start align-items-center">

            <!-- 🟦 Columna Izquierda: Logo + Nombre -->
            <div class="col-md-4 mb-3 mb-md-0 d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                <img src="{{ asset('img/black_logo.png') }}" alt="Logo Cliente" style="height: 60px;">
                <span class="">GORDO'S HOUSE</span>
            </div>

            <!-- ⚪ Columna Central: Derechos de autor -->
            <div class="col-md-4 mb-3 mb-md-0 text-center">
                <p class="mb-1">&copy; {{ date('Y') }} DigitConnection. Todos los derechos reservados.</p>
                <p class="mb-0">Diseñado por Mijail Casoni para Gordo's House</p>
            </div>



            <!-- 🟥 Columna Derecha: Redes Sociales -->
            <div class="col-md-4 d-flex justify-content-center justify-content-md-end gap-3">
                <a href="https://facebook.com/yourpage" target="_blank" class="text-white" aria-label="Facebook">
                    <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                </a>
                <a href="https://instagram.com/yourpage" target="_blank" class="text-white" aria-label="Instagram">
                    <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                </a>
            </div>

        </div>
    </div>
</footer>

       <!-- Botón flotante de WhatsApp -->

    <a href="https://wa.me/56950148342?text=Hola%20me%20interesa%20saber%20mas%20sobre%20un%20producto¡¡"
        class="whatsapp-icon"
        target="_blank"
        aria-label="Contáctanos por WhatsApp">
        <img src="{{ asset('img/whatsapp-icon.png') }}" alt="WhatsApp">
    </a>





    <!-- Definir locales -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

   <!-- Datos compartidos desde Laravel a JS -->
<script>
    window.storeLocations = @json($locales ?? []);
    console.log('Store Locations:', window.storeLocations); // útil para debugging
</script>

<!-- Leaflet JS (debe ir antes que tu script personalizado) -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin></script>

<!-- Tu script personalizado -->
<script src="{{ asset('js/map.js') }}"></script>
 <script> console.log('Hola desde el script personalizado'); </script>
  
    <!-- Agrega Bootstrap Icons CDN antes de cerrar </body> si no está incluido -->
    

     <!-- Tracking, formulario y WhatsApp -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Track page visit
            fetch('/api/track-page-visit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    url: window.location.href
                })
            });




            // Track clicks
            document.addEventListener('click', event => {
                fetch('/api/track-click', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        url: window.location.href,
                        element_id: event.target.id,
                        element_class: event.target.className
                    })
                });
            });


            // Contact form

            const form = document.getElementById('contactForm');

if (form) {
  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const data = Object.fromEntries(new FormData(form).entries());

    // Obtener token CSRF desde meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
      const resp = await fetch('/api/contact', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(data)
      });

      if (!resp.ok) {
        throw resp;
      }

      // Tracking no bloqueante, captura error para que no afecte UX
      fetch('/api/track-form-submission', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
          form_name: 'contact_form',
          data
        })
      }).catch(err => console.warn('Tracking falló:', err));

      alert('Mensaje enviado con éxito!');
      form.reset();

    } catch (error) {
      let errMsg = '';

      if (error.json) {
        try {
          const errData = await error.json();
          errMsg = errData.message || JSON.stringify(errData);
        } catch {
          errMsg = error.statusText || 'Error desconocido';
        }
      } else {
        errMsg = error.message || error.statusText || 'Error desconocido';
      }

      alert('Error: ' + errMsg);
    }
  });
}


            // WhatsApp icon click
            document.getElementById('whatsapp-icon')?.addEventListener('click', () => {
                fetch('/api/track-whatsapp-interaction', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        event_type: 'click',
                        phone_number: '56950148342'
                    })
                });
            });
        });
    </script>
</body>

</html>