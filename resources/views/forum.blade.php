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

        <!-- Formulario de Búsqueda y Filtros -->
        @include('components.search-filter')

        <!-- Noticias filtradas o una sola noticia -->
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

            <!-- Comentarios -->
            <div class="container mt-4">
                <h3>Comentarios</h3>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @foreach($notice->comments as $comment)
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comment->user->name }}</h5>
                            <p class="card-text">{{ $comment->body }}</p>
                            <p class="text-muted">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endforeach 

                @auth
                    <h4>Deja un comentario</h4>
                    <form action="{{ route('comments.store', $notice->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Comentar</button>
                    </form>
                @endauth

                @guest
                    <p>Por favor <a href="{{ route('login') }}">inicia sesión</a> para comentar.</p>
                @endguest
            </div>
        @endif

        <!-- Footer-->
        @include('components.footer')

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
