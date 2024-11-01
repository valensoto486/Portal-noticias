<!-- resources/views/forum.blade.php -->

<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
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
        @include('components.header') <!-- Header -->
=======
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
>>>>>>> f4b7403437b9c94ee24ac84ca8249ddf78772112

    <!-- Formulario de Búsqueda y Filtros -->
    @if(isset($notices))
        @include('components.search-filter')
    @endif

    <!-- Noticias o detalle de una noticia -->
    @if(isset($notices))
        @foreach($notices as $notice)
            @include('components.notice-item', ['notice' => $notice])
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $notices->links('pagination::bootstrap-5') }}
        </div>
    @elseif(isset($notice))
        @include('components.notice-details', ['notice' => $notice])
        @include('components.comments-section', ['notice' => $notice])
    @endif

    @include('components.footer') <!-- Footer -->

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
