@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Configuración de Perfil</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="image">Cambiar Imagen</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Información</button>
    </form>

    <hr>

    <form action="{{ route('profile.update-password') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="current_password">Contraseña Actual</label>
            <input type="password" name="current_password" id="current_password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Nueva Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Nueva Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
    </form>
</div>
@endsection
