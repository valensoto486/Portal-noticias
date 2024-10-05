
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Medellín Hoy | Sin filtros</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        
        @vite('resources/css/styles.css') <!-- Para cargar mis estilos -->
    </head>
    <body>
        
        @include('components.header') <!-- header -->
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('{{ Vite::asset('resources/images/ciudad-de-medellin.webp') }}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1 class="font-sans">Las voces de la ciudad</h1>
                            <span class="subheading">Blog sobre la actualidad de la ciudad, <span class="alert bg-info rounded py-1">sin filtros</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->

                    @foreach($notices as $notice)
                        <div>
                            <a href="{{ route('forum.show', $notice->id) }}">
                                <h2 class="post-title">{{ $notice->title }}</h2>
                                <p class="post-subtitle">{{ Str::limit($notice->description, 100) }}</p>
                            </a>
                            <p class="post-meta">
                                Publicado por
                                <a href="#!">{{ $notice->author }}</a>
                            </p>
                        </div>
                    @endforeach

                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    <span class="d-flex justify-content-end mb-4">
                        <a 
                        class="btn btn-info rounded py-2 text-light text-uppercase" 
                        href="{{ route('forum.show', $notice->id) }}">
                        Leer más
                    </a>
                </span>
                </div>
            </div>
        </div>
        <!-- Footer-->
        @include('components.footer')

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Mis archivos JS-->
        @vite('resources/js/scripts.js')
    </body>
</html>
