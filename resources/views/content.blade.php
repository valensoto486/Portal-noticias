@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contenido</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($forums as $forum)
            <tr>
                <td>{{ $forum->title }}</td>
                <td>{{ $forum->description }}</td>
                <td>
                    <!-- Agregar botones para editar o eliminar contenido -->
                    <a href="#" class="btn btn-warning">Editar</a>
                    <form action="#" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
