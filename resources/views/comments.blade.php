@extends('layouts.app')

@section('content')
@vite('resources/css/dashboard.css') 
<div class="container">
    <h1>Gestión de Comentarios</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Comentario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>
                        <a href="{{ route('admin.comments.edit', $comment) }}" class="btn btn-warning" style="background-color: #0dcaf0; color: white; border: none;">Editar</a>
                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" style="display:inline;" id="delete-form-{{ $comment->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="confirmarEliminacion(event, {{ $comment->id }})">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('components.footer')

<script>
    function confirmarEliminacion(event, commentId) {
        event.preventDefault(); // Evita el envío del formulario inmediato
        const form = document.getElementById(`delete-form-${commentId}`);
        const confirmacion = confirm("¿Estás seguro de eliminar este comentario?");
        if (confirmacion) {
            form.submit(); // Enviar el formulario si el usuario acepta
        }
    }
</script>
@endsection

