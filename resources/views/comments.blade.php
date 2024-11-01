@extends('layouts.app')

@section('content')
@vite('resources/css/dashboard.css') 
<div class="container">
    <h1>Gestión de Comentarios</h1>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3" style="background-color: #0dcaf0; color: white; border: none;">Volver al Dashboard</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2>Comentarios Aprobados</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Comentario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($approvedComments as $comment)
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

    <h2>Comentarios Pendientes</h2>
    @if($pendingComments->isEmpty())
        <p>No hay comentarios pendientes para aprobar.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Título de la Noticia</th>
                    <th>Comentario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingComments as $comment)
                    <tr>
                        <td>{{ $comment->notice ? $comment->notice->title : 'Noticia eliminada' }}</td>
                        <td>{{ $comment->body }}</td>
                        <td>
                            <form action="{{ route('admin.comments.approve', $comment) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="button" class="btn btn-success" onclick="confirmarAprobacion(event, this.form)">Aprobar</button>
                            </form>
                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmarEliminacion(event, {{ $comment->id }})">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@include('components.footer')

<script>
    function confirmarEliminacion(event, commentId) {
        event.preventDefault();
        const form = document.getElementById(`delete-form-${commentId}`);
        const confirmacion = confirm("¿Estás seguro de eliminar este comentario?");
        if (confirmacion) {
            form.submit();
        }
    }

    function confirmarAprobacion(event, form) {
        event.preventDefault();
        const confirmacion = confirm("¿Estás seguro de aprobar este comentario?");
        if (confirmacion) {
            form.submit();
        }
    }
</script>
@endsection
