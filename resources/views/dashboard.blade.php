@extends('layouts.app')

@section('content')
@vite('resources/css/dashboard.css') 
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-6 text-center">
            <h2>Usuarios</h2>
            <a href="{{ route('admin.users') }}" class="btn btn-primary btn-lg">Gestionar Usuarios</a>
        </div>
        <div class="col-md-6 text-center">
            <h2>Contenido</h2>
            <a href="{{ route('admin.content') }}" class="btn btn-primary btn-lg">Gestionar Contenido</a>
        </div>
        <div class="col-md-6 text-center">
            <h2>Comentarios</h2>
            <a href="{{ route('admin.comments.index') }}" class="btn btn-primary btn-lg">Gestionar Comentarios</a>
        </div>
    </div>
</div>
<!-- Footer-->
@include('components.footer')
@endsection
