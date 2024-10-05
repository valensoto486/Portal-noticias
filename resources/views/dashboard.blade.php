@extends('layouts.app')

@section('content')
<div class="container">
    @include('components.header') <!-- header -->
    <h1>Dashboard del Administrador</h1>
    <div class="row">
        <div class="col-md-6">
            <h2>Gestión de Usuarios</h2>
            <a href="{{ route('admin.users') }}" class="btn btn-primary">Ver Usuarios</a>
        </div>
        <div class="col-md-6">
            <h2>Gestión de Contenido</h2>
            <a href="{{ route('admin.content') }}" class="btn btn-primary">Ver Contenido</a>
        </div>
    </div>
    @include('components.footer') <!-- footer -->
</div>
@endsection

