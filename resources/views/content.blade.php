@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contenido</h1>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>
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
                    <a href="{{ route('admin.content.edit', $forum) }}" class="btn btn-warning" style="background-color: #0dcaf0; color: white; border: none;">Editar</a>
                    <form action="{{ route('admin.content.destroy', $forum) }}" method="POST" style="display:inline;">
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
