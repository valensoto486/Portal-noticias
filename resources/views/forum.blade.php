<!-- resources/views/forum.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Medellín Hoy | Forum</title>
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

        @if(isset($notices)) <!-- Si hay múltiples noticias -->
            @foreach($notices as $notice)
            <header class="masthead" style="background-image: url('{{ Vite::asset($notice->banner_image) }}')">
                <a href="{{ route('forum.show', $notice->id) }}">
                    <div class="container position-relative px-4 px-lg-5">
                        <div class="row gx-4 gx-lg-5 justify-content-center">
                            <div class="col-md-10 col-lg-8 col-xl-7">
                                <div class="post-heading">
                                    <h2>{{ $notice->title }}</h2>
                                    <p>{{ $notice->description }}</p>
                                    <span class="meta">
                                        Publicado por
                                        <a href="#!">{{ $notice->author }}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </header>
            @endforeach
        @elseif(isset($notice)) <!-- Si es una sola noticia -->
            <header class="masthead" style="background-image: url('{{ Vite::asset($notice->banner_image) }}')">
                <div class="container position-relative px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7">
                            <div class="post-heading">
                                <h2>{{ $notice->title }}</h2>
                                <span class="meta">
                                    Publicado por
                                    <a href="#!">{{ $notice->author }}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-content">
                            <p>{!! $notice->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Footer-->
        @include('components.footer')

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
